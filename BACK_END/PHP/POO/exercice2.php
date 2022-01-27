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

        public function CaracteristiquesVoiture(){
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
            if ($this->age<20){
                echo "Conducteur ".$this->prenom." ".$this->nom." trop jeune.";
            }
            elseif($this->age>65){
                echo "Conducteur ".$this->prenom." ".$this->nom." trop âgé.";
            }
            else {
                echo "<p>Je me nomme $this->prenom $this->nom et j'ai $this->age ans. Je suis un conducteur valide.</p>";
            }
        }
    }

    class Avion
    {
        // Attributs
        public $marque;
        public $puissance;
        public $couleur;
        public $lieuDepart;
        public $destination;

        // Methodes
        public function __construct($pmarque, $ppuissance, $pcouleur, $pDestination, $lieuAssemblage = "Paris")
        {
            $this->marque = $pmarque;
            $this->puissance = $ppuissance;
            $this->couleur = $pcouleur;
            $this->lieuDepart = $lieuAssemblage;
            $this->destination = $pDestination;
        }

        public function CaracteristiquesAvion(){
            return "<ul>
                        <li>Marque : $this->marque </li>
                        <li>Puissance : $this->puissance </li>
                        <li>Couleur : $this->couleur </li>
                        <li>Lieu de départ : $this->lieuDepart </li>
                        <li>Destination : $this->destination </li>
                    </ul>";
        }
    }


    $VBleu = new Voiture("Peugeot", 150, "bleu");

    echo $VBleu->CaracteristiquesVoiture();

    echo "<p>Le véhicule est une $VBleu->marque de couleur $VBleu->couleur et d'une puissance de $VBleu->puissance Ch.</p>";


    $CPetit1 = new Conducteur("PETIT", "Louis", 21);

    $VJaune = new Voiture("Renault", 175, "Jaune");

    echo $VJaune->CaracteristiquesVoiture();

    $VJaune = new Voiture("Fiat", 90, "Vert");

    echo $VJaune->CaracteristiquesVoiture();

    $AAirbus = new Avion ("Airbus", 900, "blanc","Malte");

    echo "<p>Avions :</p>";

    echo $AAirbus->CaracteristiquesAvion();