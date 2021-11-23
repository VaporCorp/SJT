<?php
include "../mysqli.php";
if(!$_POST['id']||!$_POST['nom']||!$_POST['type1']||!$_POST['type2']||!$_POST['taille']||!$_POST['poids']){
    die('Veuillez renseigner toutes les informations');
}
$reqadd = "INSERT INTO pokemon (id, nom, type, type2, taille, poids)
VALUES ('{$_POST['id']}','{$_POST['nom']}','{$_POST['type1']}', '{$_POST['type2']}', '{$_POST['taille']}', '{$_POST['poids']}')";

$create = mysqli_query($connexionMySql, $reqadd);