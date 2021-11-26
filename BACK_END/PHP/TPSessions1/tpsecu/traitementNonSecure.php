<?php
    $pseudo = $_GET['pseudo'];
    $mdp = $_GET['motdepasse'];
//    $pseudo = $_POST['pseudo'];
//    $mdp = $_POST['motdepasse'];

    //Connexion
    $host = "localhost";
    $user = "root";
    $password = "";
    $dbname = "tpsessions1";

    $connexionMySql = mysqli_connect($host, $user, $password, $dbname);
    $execution = mysqli_query($connexionMySql, "UPDATE users SET mot_de_passe = '$mdp' WHERE pseudo LIKE '$pseudo'");

    echo "Mot de passe modifé";
//    header('location:index.html');