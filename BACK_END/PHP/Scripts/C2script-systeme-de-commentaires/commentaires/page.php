<?php
//on définit notre variable pour pouvoir inclure les fichier
define("C2SCRIPT","peut être n'importe quoi ici");
include("fonctions/fonctions.php");

//on se connecte à la base de données (à adapter/remplacer avec votre système de connexion)
$BDD = array();
$BDD['serveur'] = "localhost";
$BDD['login'] = "root";
$BDD['pass'] = "";
$BDD['bdd'] = "nom_de_la_base_de_donnees";
$mysqli = mysqli_connect($BDD['serveur'],$BDD['login'],$BDD['pass'],$BDD['bdd']);
if(!$mysqli) exit('Connexion MySQL non accomplie!');


?><!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8">
        <title>Système de commentaire</title>
        
    </head>
    <body>
    <h1>Hello</h1>
	<p>Bienvenue sur mon site, faites-vous plaisir, postez un commentaire!</p>
	<h2>Écrire un commentaire</h2>
	<?php
	//on affiche le formulaire pour poster un commentaire
	afficherFormulaireCommentaire("page.php",123);// indiquer la page actuelle avec ou sans query du type ?id=123&... et l'id de la'rticle pour affiche les commentaire de cette article seulement, si vous utilisez ce système de commentaire pour un livre d'or par exemple, vous pouvez l'enlever et mettre seulement la page actuelle: afficherFormulaireCommentaire("page.php");
	?>
    
	<h2>Commentaires postés</h2>
	<?php
	afficherCommentaires(123);
	?>
    
	
	</body>
</html>