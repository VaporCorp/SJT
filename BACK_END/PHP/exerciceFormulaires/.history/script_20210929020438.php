<?php
if ($_SERVER["REQUEST_METHOD"] == "GET") {//je teste la methode d'envoi
    if (empty($_GET["nom"])) {//si l'input nom est vide
      echo "<p>".($nomError = "Le nom est requis")."</p>";//message d'erreur
    } else {
      $nom = test_input($_GET["nom"]);//sinon on assigne l'input récupéré dans une  variable
      
      // check if nom only contains letters and whitespace
      if (!preg_match("/^[a-zA-Z ]*$/",$nom)) {//si c'est pas un mot
        echo $nomError = "Veuillez utiliser seulements des lettres et espaces"; //erreur
      }else{//ici dernière condition optionnelle pour montrer $nom que si ce n'est pas un nombre
          $nomValable = 1;
      }
    }
    if (empty($_GET["prenom"])) {//si l'input prenom est vide
      echo "<p>".($prenomError = "Le prénom est requis")."</p>";//message d'erreur
    } else {
      $prenom = test_input($_GET["prenom"]);//sinon on assigne l'input récupéré dans une  variable
      
      // check if prenom only contains letters and whitespace
      if (!preg_match("/^[a-zA-Z ]*$/",$prenom)) {//si c'est pas un mot
        echo "<p>".($prenomError = "Veuillez utiliser seulements des lettres et espaces")."</p>"; //erreur
      }else{//ici dernière condition optionnelle pour montrer $prenom que si ce n'est pas un nombre
          $prenomValable = 1;
      }
    }
    if (empty($_GET["mail"])) {//si l'input mail est vide
      echo $mailError = "L'adresse mail est requise";//message d'erreur
    } else {
      $mail = test_input($_GET["mail"]);//sinon on assigne l'input récupéré dans une  variable
      
      // check if mail is correct
      if (!preg_match("/^[a-z0-9._%+-]+@[a-z0-9.-]+\.[a-z]{2,6}$/i",$mail)) {//si c'est pas une adresse mail correcte
        echo $mailError = "L'adresse mail n'est pas correcte"; //erreur
      }else{//ici dernière condition optionnelle pour montrer $mail que si il suit bien un pattern (REGEX)
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