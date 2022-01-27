<?php

// La création d'une classe.                X
// L'instanciation d'un objet.              X
// L'hydratation des attributs d'un objet.  X
// L'exploitation d'une méthode d'un objet. X

class Voiture{
    // Attributs
    public $marque;
    public $puissance;
    public $couleur;

    // Methodes
    public function __construct($pmarque, $ppuissance, $pcouleur){
        $this->marque = $pmarque;
        $this->puissance = $ppuissance;
        $this->couleur = $pcouleur;
    }

    public function Caracteristiques(){
        $test = $this->couleur;
        $lastChar = substr($test, -1);
        if ($lastChar=="e" OR $test=="marron"){

        }
        elseif($test=="blanc"){
            $this->couleur= "blanche";
        }
        elseif($test=="violet"){
            $this->couleur= "violette";
        }
        else {
            $this->couleur = $this->couleur."e";
        }

        return "<ul>
                    <li>Marque : $this->marque </li>
                    <li>Puissance : $this->puissance </li>
                    <li>Couleur : $this->couleur </li>
                </ul>";
    }
}

class Conducteur{
    // Attributs
    public $nom;
    public $prenom;
    public $age;

    // Methodes
    public function __construct($pnom, $pprenom, $page){
        $this->nom = $pnom;
        $this->prenom = $pprenom;
        $this->age = $page;
    }

    public function Informations(){
        return "<p>Je me nomme $this->prenom $this->nom et j'ai $this->age ans.</p>";
    }
}

class Cercle{
    // Attributs
    public $rayon;
    public $color;

    // Methodes
    public function getAire(){
        return "<p>".M_PI*pow($this->rayon, 2)."</p>";
    }

    public function drawCercle($color){
        return "<div style='background-color: $color; width: ".$this->rayon*2.."px; height: ".$this->rayon*2.."px; border-radius: 50%'></div>";
    }
}

    $VBleu = new Voiture("Peugeot", 150, "bleu");

//    $VPeugeot->marque = "Peugeot";
//    $VPeugeot->puissance = 150;
//    $VPeugeot->couleur = "violet";

    echo $VBleu->Caracteristiques();

    echo "<p>Le véhicule est une $VBleu->marque de couleur $VBleu->couleur et d'une puissance de $VBleu->puissance Ch.</p>";


    $CPetit1 = new Conducteur("PETIT", "Louis", 21);

//    $CPetit1->nom = "PETIT";
//    $CPetit1->prenom = "Louis";
//    $CPetit1->age= 21;

    echo $CPetit1->Informations();

    $Crc1 = new Cercle;

    $Crc1->rayon = 140;

    echo "<p>Le cercle de rayon $Crc1->rayon est d'aire : ".$Crc1->getAire()."</p>";

    echo $Crc1->drawCercle("red");