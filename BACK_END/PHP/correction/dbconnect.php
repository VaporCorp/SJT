<?php 
    // Paramètres de connexion à la database //
    $hote = "localhost";
    $utilisateur = "root";
    $dbname = 'coursphp';
    $pass = "";

    // Fonction de connexion à la base de donnée mysqlqli //
    $connexion = @mysqli_connect($hote, $utilisateur, $pass, $dbname);

    if($connexion){
        echo "Connexion réussie";
    }
?>