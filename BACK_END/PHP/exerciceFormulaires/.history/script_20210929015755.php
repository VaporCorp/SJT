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
 }
 //fonction pour sécuriser les données
 function test_input($data) {
    $data = trim($data);
    $data = stripslashes($data);
    $data = htmlspecialchars($data);
    return $data;
 }
?>