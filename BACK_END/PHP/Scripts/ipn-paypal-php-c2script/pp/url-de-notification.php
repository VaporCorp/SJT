<?php
namespace Listerner;
require_once 'IPNPaypal.class.php';
use PaypalIPN;
$ipn = new PayPalIPN();	

	
	/*
	*	Section configuration:
	*/
	
	// Mails pour les notifications:
	$mail_admin = "votre@mail.com";//l'adresse mail à qui seront envoyés les mails de notification
	$mail_from = $mail_admin;//l'adresse mail qui envoi les mails de notification

	// Entètes du mail de notification:
	$HeaderMail = "MIME-Version: 1.0\n";
	$HeaderMail .= "Content-type: text/html; charset=UTF-8\n";
	$HeaderMail .= "From: [IPNP] <$mail_from>\n";
	
	// Vos adresses mail PayPal pour les vérifications des données renvoyées 
	// array("mail1","mail2",...)
	$mails_paypal = array("buisness@domaine.tld");
	
	/*
	*	Fin section configuration.
	*/


$verified = $ipn->verifyIPN();
if ($verified) {
    /*
     * Process IPN
     * La liste des variables est disponible ici:
     * https://developer.paypal.com/webapps/developer/docs/classic/ipn/integration-guide/IPNandPDTVariables/
	 * En Français:
	 * https://translate.google.fr/translate?sl=en&tl=fr&js=y&prev=_t&hl=fr&ie=UTF-8&u=https://developer.paypal.com/webapps/developer/docs/classic/ipn/integration-guide/IPNandPDTVariables/
     */
	 
	// variables:
	$item_name = $_POST['item_name'];
	$mc_gross = $_POST['mc_gross'];
	$mc_currency = $_POST['mc_currency'];
	$mc_fee = $_POST['mc_fee'];
	$payment_status = $_POST['payment_status'];
	$txn_id = $_POST['txn_id'];
	$payment_date = $_POST['payment_date'];
	$first_name = $_POST['first_name'];
	$last_name = $_POST['last_name'];
	$payer_email = $_POST['payer_email'];
	$payer_status = $_POST['payer_status'];
	$address_street = $_POST['address_street'];
	$address_city = $_POST['address_city'];
	$address_state = $_POST['address_state'];
	$address_zip = $_POST['address_zip'];
	$address_country = $_POST['address_country'];
	$address_country_code = $_POST['address_country_code'];
	$payer_business_name = $_POST['payer_business_name'];
	$memo = $_POST['memo'];
	$custom = $_POST['custom'];
	
	// Vérifie l'email du destinataire pour voir s'il correspond à votre liste d'adresses e-mail PayPal
	$mail_paypal_trouve = false;
	foreach ($mails_paypal as $mail) {
		if (strtolower($_POST['receiver_email']) == strtolower($mail)) {
			$mail_paypal_trouve = true;
			break;
		}
	}
	if(!$mail_paypal_trouve){
		//Le mail paypal du destinataire n'est pas le bon
		file_put_contents("logs/url-de-notification.txt","@@RECEIVER_EMAIL_NOT_MATCH:".time().":txn_id='".$_POST['txn_id']."',receiver_email='".$_POST['receiver_email']."'\n",FILE_APPEND|LOCK_EX);
	} else {
		// On vérifie si c'est la bonne transaction, enregistrée depuis la page où se trouve le bouton d'achat PayPal (avec $custom)
		// Transaction enregistrée dans la table pp_transactions
		$mysqli = mysqli_connect("localhost", "root", "pass", "base");
		if(!$mysqli) {
			file_put_contents("logs/url-de-notification.txt","@@MYSQL_NOT_CONNECT:".time().":Connexion non établie, erreur retournée: ".mysqli_error($mysqli)."\n",FILE_APPEND|LOCK_EX);
			exit;
		}
		
		$pp_transactions=true;
		$req=mysqli_query($mysqli,"SELECT * FROM pp_transactions WHERE custom='".$custom."'");
		if(mysqli_num_rows($req)!=1 AND $custom!="xyz123"){
			//cette transaction n'existe pas dans la base de données
			file_put_contents("logs/url-de-notification.txt","@@CUSTOM_NOT_FOUND:".time().":custom='$custom',txn_id='".$_POST['txn_id']."'\n",FILE_APPEND|LOCK_EX);
		} else {
			$info=mysqli_fetch_assoc($req);
			//vérification des valeurs renvoyées par "PayPal"
			// On peut bien évidement faire plus de vérifications
			if($mc_gross != $info['amount']) $pp_transactions=false;
			if($payment_status != "Completed") $pp_transactions=false; //Completed/Pending
			//if...
			//if...
			if($custom == "xyz123") $pp_transactions=true;//si utilisation de la simulation d'IPN depuis https://developer.paypal.com/developer/ipnSimulator/ on valide pour le test
			if(!$pp_transactions){
				//Les valeurs renvoyées par paypal ne correspondent pas au bouton cliqué
				file_put_contents("logs/url-de-notification.txt","@@NOT_IDENTICAL:".time().":txn_id='".$_POST['txn_id']."'\n",FILE_APPEND|LOCK_EX);
			} else {
							
				/**
				*  ici on valide la transaction
				*
				*  - Envoi d'un mail récapitulatif
				*  - Modification de la base de données
				*
				*/
				
				//Enregistre toutes les valeurs _POST afin de les vérifier dans le mail qui sera envoyé à l'admin:
				$POSTS="";
				foreach($_POST as $name => $value){
					$POSTS.="$name='$value',";
				}
				
				//envoi du mail à l'admin:
				$Msg = "<!DOCTYPE HTML><html><head></head><body>
				Voici quelques informations concernant la transaction:
				<br />
				********************************
				<br />
				<br />Transaction ID: $txn_id
				<br />Date de paiement: $payment_date
				<br />Etat du paiement: $payment_status
				<br />
				<br />Montant: $mc_gross $mc_currency
				<br />Frais Paypal: $mc_fee $mc_currency
				<br />Montant total: ".($mc_gross - $mc_fee)." $mc_currency
				<br />
				<br />Acheteur:
				<br />$first_name $last_name
				<br />$address_street
				<br />$address_zip $address_city
				<br />$address_state  $address_country  $address_country_code
				<br />Adresse e-mail: $payer_email
				".(trim($payer_business_name)!=""?"<br />Nom de l'entreprise: $payer_business_name":"")."
				".(trim($memo)!=""?"<br /><br />Message du client: $memo":"")."
				<br />
				<br />Statut Paypal du client: $payer_status
				<br />
				<br />********************************
				<br />Valeur _POST PayPal pour éventuel débug: $POSTS
				</body></html>";
				mail($mail_admin,"IPN PayPal, paiement validé!",$Msg,$HeaderMail);
				
				//on peut ensuite créditer le membre ici:
				//mysqli_query($mysqli,"UPDATE membres SET argent=argent+$mc_gross WHERE id={$info['id_membre']}");
			}
		}
	}
} else {
	if(count($_POST))file_put_contents("logs/url-de-notification.txt","@@INVALID:".time().":txn_id='".htmlentities($_POST['txn_id'],ENT_QUOTES,"UTF-8")."'\n",FILE_APPEND|LOCK_EX);
}
//Répondre avec une réponse 200 vide pour indiquer à paypal que l'IPN a été reçu correctement.
header("HTTP/1.1 200 OK");