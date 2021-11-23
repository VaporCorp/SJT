<?php
//var_dump($_POST['valeurnum']);
include "../requetes.php";
$reqdel = "DELETE FROM UTILISATEURS WHERE ID=".$_POST['valeurnum'];
$delete = mysqli_query($connexionMySql, $reqdel);