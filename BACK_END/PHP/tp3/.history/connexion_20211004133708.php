<?php
    
    $varEmailBrut = "bonjour@yohannmoy.fr";
    $varMDPBrut = "toto";

    $logIdent = $_POST["ident"];
    $logMDP = $_POST["passwd"];

    if(($logIdent === $varEmailBrut) && ($logMDP === $varMDPBrut)) {
        echo "Connecté";
    }
    else {
        echo "Problème de connexion";
    }
?>