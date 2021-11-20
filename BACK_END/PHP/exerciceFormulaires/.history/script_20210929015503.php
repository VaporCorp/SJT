<?php
if ($_SERVER["REQUEST_METHOD"] == "GET") {//je teste la methode d'envoi
    if (empty($_GET["name"])) {//si l'input name est vide
      $nameError = "Name is required";//message d'erreur
    } else {
      $name = test_input($_GET["name"]);//sinon on assigne l'input récupéré dans une  variable
      
      // check if name only contains letters and whitespace
      if (!preg_match("/^[a-zA-Z ]*$/",$name)) {//si c'est pas un mot
        echo $nameError = "Only letters and white space allowed"; //erreur
      }else{//ici dernière condition optionnelle pour montrer $name que si ce n'est pas un nombre
          echo $name;
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