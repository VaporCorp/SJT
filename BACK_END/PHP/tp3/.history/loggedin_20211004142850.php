<?php
    session_start();

    if(($_SESSION["userName"] !="") && ($_SESSION["userPasswd"] !="")){
        echo "<h1>Bonjour ".$_SESSION["userName"]." vous êtes bien connecté</h1>";
        echo "<h2>Votre mot de passe est : ".$_SESSION["userPasswd"]."</h2>";
    }
    else {
        echo "<h1>Vous ne disposez pas droits nécessaires pour accéder à cette session</h1>";

        header('Refresh: 3; index.php');

        // A retenir des sessions :
        // Elles permettent d'effectuer une connexion
        // Les données de connexion restent en cache temporaire (le temps de la session / le temps d'ouverture du navigateur)
        // A la fermeture du navigateur la session se cloture et il est nécessaire de se reconnecter

        // Les cookies permettent de conserver les données de connexion pendant une durée définie basée sur le timestamp
    }
?>