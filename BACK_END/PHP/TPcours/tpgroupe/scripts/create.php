<?php
include "../mysqli.php";
if(!$_POST['id']||!$_POST['nom']||!$_POST['type1']||!$_POST['type2']||!$_POST['taille']||!$_POST['poids']){
    die('Veuillez renseigner toutes les informations');
}
$reqadd = "INSERT INTO pokemon (id, nom, type, type2, taille, poids)
VALUES ('{$_POST['id']}','{$_POST['nom']}','{$_POST['type1']}', '{$_POST['type2']}', '{$_POST['taille']}', '{$_POST['poids']}')";

$create = mysqli_query($connexionMySql, $reqadd);

header("refresh:3; url=../../index.php");?>
<html>
<head>
    <link href="../style.css" rel="stylesheet">
</head>
<header>
    <img>
    <h1>Pokémon</h1>
</header>
<h2>Pokémon en cours d'ajout !</h2>
</html>

