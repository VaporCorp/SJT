<?php
include "../requetes.php";
$ancienpseudo = $_POST['ancienpseudo'];
$nouveaupseudo = $_POST['nouveaupseudo'];

$requpd = "UPDATE UTILISATEURS SET pseudo ='".$nouveaupseudo."' WHERE pseudo='".$ancienpseudo."'";

$create = mysqli_query($connexionMySql, $requpd);