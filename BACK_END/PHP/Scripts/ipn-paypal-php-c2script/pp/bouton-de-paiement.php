<!DOCTYPE HTML>
<html>
<head>
	<meta charset="utf-8">
	<title>Bouton de paiement</title>
</head>
<body>
<?php
if(isset($_GET['retour']) AND preg_match("#^(return|cancel_return)$#",$_GET['retour'])) {
	if($_GET['retour']=="return"){
		echo "Le paiement à bien été validé !";
	} else {
		echo "Le paiement à bien été annulé.";
	}
	echo "</body></html>";
	exit;
}
//décommentez/commentez les URL suivantes une fois que tout est ok et vous souhaitez passer en réel
//$URL_Paypal				= "https://www.paypal.com/cgi-bin/webscr";//réel
$URL_Paypal					= "https://www.sandbox.paypal.com/cgi-bin/webscr";//tests

//le mail de votre compte paypal pour recevoir l'argent (l'adresse mail doit être confirmée) (Si utilisation de la sandbox, mettre l'adresse mail enregitré sur le compte sandbox)
$MAIL_Paypal				= "buisness@domaine.tld";//mail business qui reçois les paiements

$URL_du_site				= "http://www.votresite.com";//URL de votre site sans / à la fin
$PageRetour_return 			= $URL_du_site."/pp/bouton-de-paiement.php?retour=return";//URL de retour en cas de succès
$PageRetour_cancel_return 	= $URL_du_site."/pp/bouton-de-paiement.php?retour=cancel_return";//URL de retour en cas d'annulation
$PageNotifications 			= $URL_du_site."/pp/url-de-notification.php";//vous pouvez la configurer dans votre compte paypal à cette adresse (à "Notifications instantanées de paiement"): https://www.paypal.com/cgi-bin/customerprofileweb?cmd=_profile-ipn-notify (sandbox: https://www.sandbox.paypal.com/fr/cgi-bin/webscr?cmd=_profile-display-handler&tab_id=SELLER_PREFERENCES) ou utiliser l'input notify_url pour la renseigner (255 caractères max - doc Paypal)

//informations sur l'objet du paiement:
$item_name					= "Recharger le solde";//nom de l'article (127 caractères - doc PayPal)
$amount						= 1.00;//montant de l'article, mettre la valeur avec deux décimales (ici l'exemple représente 1 (un) euro)
$currency_code				= "EUR";

//on peut imaginer l'id du membre voulant recharger son compte, que l'on enregistrerais dans la base de données pour le créditer lors de l'IPN
$Id_membre					= 456;//exemple: $_SESSION[id_membre]

//on insére des données dans la table pp_transactions pour la retrouver sur la page url-de-notification.php lors de l'envoi des données par PayPal, afin de vérifier si elles correspondent
$custom 					= time().substr(str_shuffle("abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ0123456789"),0,10);//génére un id unique au format: "timestamp[a-Z0-9]{10}", soit 20 caractères
	
	/**
	* Connexion MySQL:
	*/
	$mysqli = mysqli_connect("localhost", "root", "pass", "base");
	if(!$mysqli) {
		echo "Connexion non établie.";
		exit;
	}
	
$req=mysqli_query($mysqli,"INSERT INTO pp_transactions SET custom='$custom',item_name='$item_name',amount='$amount',id_membre=$Id_membre,date=".time()."");
?>
<br />
<form method="post" action="<?php echo $URL_Paypal; ?>">
	<!--
	 // Tous les name input sont disponibles à cette adresse:
	// https://developer.paypal.com/docs/classic/paypal-payments-standard/integration-guide/formbasics/
	-->
	<input type="hidden" name="cmd" 			value="_xclick" />
	<input type="hidden" name="amount" 			value="<?php echo $amount; ?>" />
	<input type="hidden" name="currency_code" 	value="<?php echo $currency_code; ?>" />
	<input type="hidden" name="return" 			value="<?php echo $PageRetour_return; ?>" />
	<input type="hidden" name="cancel_return" 	value="<?php echo $PageRetour_cancel_return; ?>" />
	<input type="hidden" name="notify_url" 		value="<?php echo $PageNotifications; ?>" />
	<input type="hidden" name="business" 		value="<?php echo $MAIL_Paypal; ?>" />
	<input type="hidden" name="item_name" 		value="<?php echo $item_name; ?>" />
	<input type="hidden" name="lc" 				value="FR" />
	<input type="hidden" name="custom" 			value="<?php echo $custom; ?>" />
	<input type="submit" value="Recharger le solde de <?php echo $amount; ?> EURO" />
</form>
</body>
</html>