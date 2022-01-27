<?php

// La création d'une classe.                X
// L'instanciation d'un objet.              X
// L'hydratation des attributs d'un objet.  X
// L'exploitation d'une méthode d'un objet. X

    class Voiture{
        // Attributs
        public $couleur;
        public $puissance;
        public $boiteAuto;

        // Methodes
        public function Avancer($distance){
            return $distance/$this->puissance;
        }
    }

    $VBleu= new Voiture;

    var_dump($VBleu);

    echo "<br><br>";

    $VBleu->couleur = "Bleu";
    $VBleu->puissance = 365;
    $VBleu->boiteAuto = false;

    var_dump($VBleu);

    echo "<br><br>";

    var_dump($VBleu->Avancer("1150"));

    echo "<br><br>";

    $VRouge= new Voiture;

    var_dump($VRouge);

    echo "<br><br>";

    $VRouge->couleur = "Rouge";
    $VRouge->puissance = 270;
    $VRouge->boiteAuto = true;

    var_dump($VRouge);

    echo "<br><br>";

    var_dump($VRouge->Avancer("1150"));

    if (($VBleu->Avancer("1150"))<($VRouge->Avancer("1150"))){
        echo "<p>Le véhicule le plus puissant est le véhicule $VBleu->couleur </p>";
    }
    else {
        echo "<p>Le véhicule le plus puissant est le véhicule $VBleu->couleur </p>";
    }