<?php
include "connexionbdd.php";
if(!$_POST['nom']||!$_POST['prenom']||!$_POST['email']||!$_POST['motdepasse']){
    echo "<h2>Veuillez renseigner toutes les informations</h2>";
    echo "<a href='../index.php'><button>Retourner à l'accueil</button></a>";
    die();
}

$regnom = "/^[a-zA-ZàáâäãåąčćęèéêëėįìíîïłńòóôöõøùúûüųūÿýżźñçčšžÀÁÂÄÃÅĄĆČĖĘÈÉÊËÌÍÎÏĮŁŃÒÓÔÖÕØÙÚÛÜŲŪŸÝŻŹÑßÇŒÆČŠŽ∂ð ,.'-]+$/u";
$regmail = "[\w.-]+@[\w-]+\.\w{3,6}";
$regmdp = "^(?=.*[A-Z])(?=.*[a-z])(?=.*\d)(?=.*[-+!*$@%_])([-+!*$@%_\w]{8,15})$";

if (trim($_POST['nom']=='')){
    echo "<h2>Vous n'avez pas renseigné de nom !</h2>";
}
else {
    $nom = trim($_POST['nom']);
    if (preg_match($regnom, $nom)) {
        echo "<h2>Le nom : {$nom} est ok !</h2>";
    }
    else {
        echo "<h2>Votre nom contient des caractères interdits !</h2>";
    }
}
if (trim($_POST['prenom']=='')){
    echo "<h2>Vous n'avez pas renseigné de nom !</h2>";
}
else {
    $prenom = trim($_POST['prenom']);
    if (preg_match($regnom, $prenom)) {
        echo "<h2>Le nom : {$prenom} est ok !</h2>";
    }
    else {
        echo "<h2>Votre nom contient des caractères interdits !</h2>";
    }
}
if (trim($_POST['email']=='')){
    echo "<h2>Vous n'avez pas renseigné de nom !</h2>";
}
else {
    $email = trim($_POST['email']);
    if (preg_match($regnom, $email)) {
        echo "<h2>Le nom : {$email} est ok !</h2>";
    }
    else {
        echo "<h2>Votre nom contient des caractères interdits !</h2>";
    }
}

$reqadd = "INSERT INTO users (nom, prenom, email, motdepasse)
        VALUES ('{$_POST['nom']}','{$_POST['prenom']}', '{$_POST['email']}', '{$_POST['motdepasse']}')";

$create = mysqli_query($connexionMySql, $reqadd);
header('Location: ../index.php');