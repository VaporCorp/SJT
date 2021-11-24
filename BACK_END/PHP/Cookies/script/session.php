<?php
session_start();

// Récupérer l'id
$session_id = session_id();
// $_COOKIE['PHPSESSID'];

if ($session_id) {
    $_SESSION['nom'] = $_POST['nom'];
    $_SESSION['prenom'] = $_POST['prenom'];
    $_SESSION['mot_de_passe'] = $_POST['mot_de_passe'];

    echo $_SESSION['nom'];
}
else {
    echo "La session n'a pas été ouverte, il manque probablement une information dans le formulaire";
}
// Accéder aux variables

//$ID = $_SESSION['id'];