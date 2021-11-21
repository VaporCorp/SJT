<?php
class PaypalIPN
{
    private $use_sandbox 		= true;//Indique si la sandbox doit être utilisée pour faire des tests (false en production)
    private $use_local_certs 	= true;// Indique si les certificats locaux doivent être utilisés et pas ceux enregistrés sur le serveur (true ou false, si l'un fonctionne, laissez le)
	private $debug 				= false;// Affiche les erreurs (Exception) à l'écran (false en production)
	private $logs 				= true;// Enregistrer les erreurs/transactions dans les fichiers logs
	private $logs_Exception 	= "logs/newException.txt";//lien vers le fichier de logs d'erreurs
	private $logs_IPN 			= "logs/IPNPayPal.txt";//lien vers le fichier de logs des IPN reçus de PayPal
	private $tls_test 			= false;//affiche si PayPal se connecte bien TLS (false en production)
	
    /**
     * PayPal IPN postback endpoints
     */
    const VERIFY_URI = 'https://ipnpb.paypal.com/cgi-bin/webscr';
    const SANDBOX_VERIFY_URI = 'https://ipnpb.sandbox.paypal.com/cgi-bin/webscr';
	const TLS_TEST = 'https://tlstest.paypal.com/';

    /**
     * Possible responses from PayPal after the request is issued.
     */
    const VERIFIED = 'VERIFIED';
    const INVALID = 'INVALID';

    /**
     * Determine endpoint to post the verification data to.
     * @return string
     */
    public function getPaypalUri()
    {
		if ($this->tls_test) {
			return self::TLS_TEST;
		} else {
			if ($this->use_sandbox) {
				return self::SANDBOX_VERIFY_URI;
			} else {
				return self::VERIFY_URI;
			}
		}
    }
	
    /**
     * Verification Function
     * - Sends the incoming post data back to paypal using the cURL library.
     * - Envoie les données post entrantes à paypal en utilisant la bibliothèque cURL.
     * @return bool
     * @throws Exception
     */
    public function verifyIPN()
    {
        if ( ! count($_POST)) {
            if ($this->logs) file_put_contents($this->logs_Exception,"@@".time().":Données POST manquantes\n",FILE_APPEND|LOCK_EX);
			if ($this->debug) throw new Exception("Missing POST Data");
        } else {
		
			$raw_post_data = file_get_contents('php://input');
			$raw_post_array = explode('&', $raw_post_data);
			$myPost = [];
			foreach ($raw_post_array as $keyval) {
				$keyval = explode('=', $keyval);
				if (count($keyval) == 2) {
					// Since we do not want the plus in the datetime string to be encoded to a space, we manually encode it.
					// Puisque nous ne voulons pas que le plus de la chaîne datetime soit encodé dans un espace, nous l'encodons manuellement.
					if ($keyval[0] === 'payment_date') {
						if (substr_count($keyval[1], '+') === 1) {
							$keyval[1] = str_replace('+', '%2B', $keyval[1]);
						}
					}
					$myPost[$keyval[0]] = urldecode($keyval[1]);
				}
			}

			// Build the body of the verification post request, adding the _notify-validate command.
			// Construction du corps de la requête de vérification, en ajoutant la commande _notify-validate.
			$req = 'cmd=_notify-validate';
			$POSTS='';
			$get_magic_quotes_exists = false;
			if (function_exists('get_magic_quotes_gpc')) {
				$get_magic_quotes_exists = true;
			}
			foreach ($myPost as $key => $value) {
				if ($get_magic_quotes_exists == true && get_magic_quotes_gpc() == 1) {
					$value = urlencode(stripslashes($value));
				} else {
					$value = urlencode($value);
				}
				$req .= "&$key=$value";
				$POSTS.="$key='$value',";
			}

			// Post the data back to paypal, using curl. Throw exceptions if errors occur.
			// Poster les données à paypal, en utilisant curl. Jetez des exceptions si des erreurs se produisent.
			$ch = curl_init($this->getPaypalUri());
			curl_setopt($ch, CURLOPT_HTTP_VERSION, CURL_HTTP_VERSION_1_1);
			curl_setopt($ch, CURLOPT_POST, 1);
			curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
			curl_setopt($ch, CURLOPT_POSTFIELDS, $req);
			curl_setopt($ch, CURLOPT_SSLVERSION, 6);//TLSv1_2 (6)
			
			// This is often required if the server is missing a global cert bundle, or is using an outdated one.
			// Cela est souvent nécessaire si le serveur manque d'un ensemble de certificats global ou s'il utilise un ensemble de certificats obsolète.
			// disponible à cette adresse: https://curl.haxx.se/ca/cacert.pem
			if ($this->use_local_certs) {
				curl_setopt($ch, CURLOPT_CAINFO, __DIR__ . "/cert/cacert.pem");
				//curl_setopt($ch, CURLOPT_SSLCERT, __DIR__ . "/cert/g5.pem");
			} else {
				curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, 1);//1
				curl_setopt($ch, CURLOPT_SSL_VERIFYHOST, 2);
			}
			curl_setopt($ch, CURLOPT_FORBID_REUSE, 1);
			curl_setopt($ch, CURLOPT_CONNECTTIMEOUT, 30);
			curl_setopt($ch, CURLOPT_HTTPHEADER, array('Connection: Close'));
			$res = curl_exec($ch);
			if ( ! ($res)) {
				$errno = curl_errno($ch);
				$errstr = curl_error($ch);
				curl_close($ch);
				if ($this->logs) file_put_contents($this->logs_Exception,"@@".time().":cURL erreur: [$errno] $errstr\n",FILE_APPEND|LOCK_EX);
				if ($this->debug) throw new Exception("cURL error: [$errno] $errstr");
			} else {
				$info = curl_getinfo($ch);
				$http_code = $info['http_code'];

				if ($http_code != 200) {
					if ($this->logs) file_put_contents($this->logs_Exception,"@@".time().":PayPal a répondu avec le code http $http_code\n",FILE_APPEND|LOCK_EX);
					if ($this->debug) throw new Exception("PayPal responded with http code $http_code");
				}
				curl_close($ch);
				if ($this->tls_test) {
					throw new Exception("TLS_TEST: $res"); //var_dump($info)
				}
			}
			// Check if PayPal verifies the IPN data, and if so, return true.
			if ($res == self::VERIFIED) {
				if ($this->logs) file_put_contents($this->logs_IPN,"@@VALID:".$POSTS."\n",FILE_APPEND|LOCK_EX);
				return true;
			} else {
				if ($this->logs) file_put_contents($this->logs_IPN,"@@INVALID:".$POSTS."\n",FILE_APPEND|LOCK_EX);
				return false;
			}
		}
    }
}