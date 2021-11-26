<?php
include "connexionbdd.php";
if(!$_POST['nom']||!$_POST['pseudo']||!$_POST['mot_de_passe']){
    echo "<h2>Veuillez renseigner toutes les informations</h2>";
    echo "<a href='../index.php'><button>Retourner à l'accueil</button></a>";
    die();
}
$reqadd = "INSERT INTO users (nom, pseudo, mot_de_passe)
        VALUES ('{$_POST['nom']}','{$_POST['pseudo']}', '{$_POST['mot_de_passe']}')";

$create = mysqli_query($connexionMySql, $reqadd);
header('Location: ../index.php');