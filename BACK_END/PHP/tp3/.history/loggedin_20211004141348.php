<?php
    if(($_SESSION["userName"] !="") && ($_SESSION["userPasswd"] !="")){
        echo "<h1>Bonjour ".$_SESSION["userName"]." vous êtes bien connecté</h1>";
        echo "<h2>Votre mot de passe est :".$_SESSION["userMDP"]."</h2>";
    }
    else {
        echo "<h1>Vous ne disposez pas droits nécessaires pour accéder à cette session</h1>";

        header('Refresh: 3; index.php');
    }
?>