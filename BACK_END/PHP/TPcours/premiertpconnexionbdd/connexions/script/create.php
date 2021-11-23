<?php
include "../requetes.php";
$nom = $_POST['nom'];
$pseudo = $_POST['pseudo'];
$password = $_POST['password'];

$reqadd = "INSERT INTO UTILISATEURS (nom, pseudo, mot_de_passe)
VALUES ('$nom','$pseudo','$password')";

$create = mysqli_query($connexionMySql, $reqadd);