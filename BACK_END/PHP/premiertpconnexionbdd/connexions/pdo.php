<?php
// VERSION PDO

$host = "localhost";
$user = "root";
$password = "";
$dbname = "premiertpconnexionbdd";

$connexionPDO = new PDO ('mysql:host'.$host .';dbname='.$dbname, $user, $password);

var_dump($connexionPDO);
if($connexionPDO){
    echo "Connexion réussie";
}
else {
    echo "ça marche po";
}
$connexionPDO -> errorCode();
try {
    $connexionPDO;
} catch(PDOException $e) {
    echo $e->getMessage();
}