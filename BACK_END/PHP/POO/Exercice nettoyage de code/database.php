<?php 
    /* Fichier dont le contenu est exclusif à la BDD */

    /* Connexion : */

    function dbConnect(): PDO
    {
        $hote = "localhost";
        $dbname = "poo";
        $utilisateur = 'root';
        $pass = '';

        return new PDO('mysql:host='.$hote.'; charset=UTF8; dbname='.$dbname, $utilisateur, $pass);

    }
