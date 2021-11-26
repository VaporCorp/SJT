<?php

    //Fonction de connexion à la BDD
    function db_connect(){
        $user = 'root';
        $pass = '';

        try {
            $dbh = new PDO('mysql:host=localhost;dbname=tp3;charset=UTF8', $user, $pass);
        }
        catch (PDOException $e) {
            print "Erreur de connexion à la base de données !: " . $e ->get_message() . "<br/>";
            die();
        }

        return $dbh;
    }
    
    $varEmailBrut = "bonjour@yohannmoy.fr";
    $varMDPBrut = "toto";

    $logIdent = $_POST["ident"];
    $logMDP = $_POST["passwd"];

    $dbRequest = db_connect() ->query("SELECT nom, mdp FROM user WHERE nom LIKE $logIdent AND mdp LIKE $logMDP ");

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