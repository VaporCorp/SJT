<?php
if ($_SERVER["REQUEST_METHOD"] == "GET") {//je teste la methode d'envoi
    if (empty($_GET["nom"])) {//si l'input nom est vide
      $nomError = "nom is required";//message d'erreur
    } else {
      $nom = test_input($_GET["nom"]);//sinon on assigne l'input récupéré dans une  variable
      
      // check if nom only contains letters and whitespace
      if (!preg_match("/^[a-zA-Z ]*$/",$nom)) {//si c'est pas un mot
        echo $nomError = "Only letters and white space allowed"; //erreur
      }else{//ici dernière condition optionnelle pour montrer $nom que si ce n'est pas un nombre
          $nomValable = 1;
      }
    }
    if (empty($_GET["prenom"])) {//si l'input prenom est vide
      $prenomError = "prenom is required";//message d'erreur
    } else {
      $prenom = test_input($_GET["prenom"]);//sinon on assigne l'input récupéré dans une  variable
      
      // check if prenom only contains letters and whitespace
      if (!preg_match("/^[a-zA-Z ]*$/",$prenom)) {//si c'est pas un mot
        echo $prenomError = "Only letters and white space allowed"; //erreur
      }else{//ici dernière condition optionnelle pour montrer $prenom que si ce n'est pas un nombre
          $prenomValable = 1;
      }
    }
    if (empty($_GET["mail"])) {//si l'input mail est vide
      $mailError = "mail is required";//message d'erreur
    } else {
      $mail = test_input($_GET["mail"]);//sinon on assigne l'input récupéré dans une  variable
      
      // check if mail only contains letters and whitespace
      if (!preg_match("/^[a-zA-Z ]*$/",$mail)) {//si c'est pas un mot
        echo $mailError = "Only letters and white space allowed"; //erreur
      }else{//ici dernière condition optionnelle pour montrer $mail que si ce n'est pas un nombre
          $mailValable = 1;
      }
    }
 }
 //fonction pour sécuriser les données
 function test_input($data) {
    $data = trim($data);
    $data = stripslashes($data);
    $data = htmlspecialchars($data);
    return $data;
 }
?>