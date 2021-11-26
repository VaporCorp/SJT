<?php
    
    $varEmailBrut = "bonjour@yohannmoy.fr";
    $varMDPBrut = "toto";

    $logIdent = $_POST[ident];
    $logMDP = $_POST[passwd];

    echo $logIdent;
    echo $logMDP;

    if($logIdent === $varEmailBrut) && ($logMDP === $varMDPBrut) {
        echo "connecté";
    }
    else {
        echo "problème de connexion";
    }
?>