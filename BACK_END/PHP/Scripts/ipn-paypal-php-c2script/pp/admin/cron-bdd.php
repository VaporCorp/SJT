<?php
/*
* Supprime les anciennes données enregistrées dans la base de données lors de la venue sur la page bouton-de-paiement.php
* On part du principe qu'un lien peut être valide pendant 1 journée environ, en générale, l'utilisateur clic puis paye et valide la transaction
* Pour éviter l'insertion d'une ligne dans la table pp_transaction lors de la venu sur la page du bouton, il est préférable de faire un système du genre: enregistrement d'une nouvelle ligne dans la base de données, seulement quand l'utilisateur clic sur le bouton de paiement
* Ce fichier peut être lancé automatiquement en tache cron chaque 24h
*/
$jours=2;//si 3 (par exemple): toutes les valeurs "date" > 3 jours seront supprimées
//connexion à la base de données:
$mysqli = mysqli_connect("localhost", "root", "pass", "base");
if(!$mysqli) {
	echo "Connexion non établie.";
	exit;
}
if(mysqli_query($mysqli,"DELETE FROM pp_transactions WHERE date<".(time()-($jours*86400)))) echo "OK";
else echo "KO: ".mysqli_error($mysqli);
