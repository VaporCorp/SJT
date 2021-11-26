<?php

    //Fonction de connexion à la BDD
    function db_connect(){
        $user = 'root';
        $pass = '';

        try {
            $dbh = new PDO('mysql:host=;dbname=;')
        }
        catch (PDOException $e) {
            print "Erreur de connexion à la base de données !: " . $e ->ge
            die();
        }

        return $dbh;
    }
    
    $varEmailBrut = "bonjour@yohannmoy.fr";
    $varMDPBrut = "toto";

    $logIdent = $_POST["ident"];
    $logMDP = $_POST["passwd"];

    if(($logIdent === $varEmailBrut) && ($logMDP === $varMDPBrut)) {
        session_start();

        $_SESSION["userName"] = $logIdent;
        $_SESSION["userPasswd"] = $logMDP;

        echo "
                Félicitations : Authentification en cours ...";

        header('Refresh: 3; loggedin.php');
    }
    else 
        echo "Problème de connexion";
    
?>