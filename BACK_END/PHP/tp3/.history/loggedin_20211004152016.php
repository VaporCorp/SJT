<?php
    session_start();

    if(($_SESSION["userName"] !="") && ($_SESSION["userPasswd"] !="")){
        echo "<h1>Bonjour ".$_SESSION["userName"]." vous êtes bien connecté</h1>";
        echo "<h2>Votre mot de passe est : ".$_SESSION["userPasswd"]."</h2>";
        echo "<button "
    }
    else {
        echo "<h1>Vous ne disposez pas droits nécessaires pour accéder à cette session</h1>";

        header('Refresh: 3; index.php');

        // A retenir des sessions :
        // Elles permettent d'effectuer une connexion
        // Les données de connexion restent en cache temporaire (le temps de la session / le temps d'ouverture du navigateur)
        // A la fermeture du navigateur la session se cloture et il est nécessaire de se reconnecter
        // Cependant à la fermeture de l'onglet la session reste active car la session est compté sur le navigateur non sur l'onglet
        // Pour ouvrir une session : session_start();
        // Pour clore une session :
        
        // Les cookies permettent de conserver les données de connexion similaires à une session pendant une durée définie basée sur le timestamp lors du refresh
        // Les cookies sont stockés côté client dans le navigateur comme les sessions
        // Cependant leur fonctionnement diffère
    }
?> 