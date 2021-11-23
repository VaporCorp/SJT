<?php
$host = "localhost";
$user = "root";
$password = "";
$dbname = "premiertpconnexionbdd";

$connexionMySql = mysqli_connect($host, $user, $password, $dbname);
//var_dump($connexion);
if($connexionMySql){
    echo "Connexion réussie";
}
else {
//    mysqli_connect_errno();
//    mysqli_connect_error();
}
//mysqli_close($connexionMySql);
//var_dump($connexionMySql);
