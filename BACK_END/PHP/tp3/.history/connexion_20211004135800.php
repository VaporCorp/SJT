<?php
    
    $varEmailBrut = "bonjour@yohannmoy.fr";
    $varMDPBrut = "toto";

    $logIdent = $_POST["ident"];
    $logMDP = $_POST["passwd"];

    if(($logIdent === $varEmailBrut) && ($logMDP === $varMDPBrut)) {
        session_start();

        $_SESSION["userName"] = $logIdent;
        $_SESSION["userPasswd"] = $logMDP;

        echo "Connecté";
    }
    else {
        echo "Problème de connexion";
    }
?>