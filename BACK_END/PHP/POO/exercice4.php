<?php

// La création d'une classe.                X
// L'instanciation d'un objet.              X
// L'hydratation des attributs d'un objet.  X
// L'exploitation d'une méthode d'un objet. X

class Voiture{
    // Attributs
    private $marque;
    private $puissance;
    private $couleur;

    // Methodes
    public function __construct($pmarque, $ppuissance, $pcouleur){
        $this->setAllAttributes($pmarque, $ppuissance, $pcouleur);
    }

    public function CaracteristiquesVoiture(){
        return "<ul>
                        <li>Marque : {$this->getMarque()} </li>
                        <li>Puissance : {$this->getPuissance()} </li>
                        <li>Couleur : {$this->getCouleur()} </li>
                    </ul>";
    }

    private function setAllAttributes($pmarque, $ppuissance, $pcouleur){
        $this->setMarque($pmarque);
        $this->setPuissance($ppuissance);
        $this->setCouleur($pcouleur);
    }

    private function setMarque($pmarque){
        $this->marque = $pmarque;
    }

    private function setPuissance($ppuissance){
        $this->puissance = $ppuissance;
    }

    private function setCouleur($pcouleur){
        $this->couleur = $pcouleur;
    }

    private function getMarque(){
        return $this->marque;
    }

    private function getPuissance(){
        return $this->puissance;
    }

    private function getCouleur(){
        return $this->couleur;
    }
}

class Conducteur{
    // Attributs
    private $nom;
    private $prenom;
    private $age;

    // Methodes
    public function __construct($pnom, $pprenom, $page){
        $this->setIdentity($pnom, $pprenom, $page);
    }

    public function setIdentity($pnom, $pprenom, $page){
        $this->setNom($pnom);
        $this->setPrenom($pprenom);
        $this->setAge($page);
    }

    private function setNom($pnom){
        $this->nom = $pnom;
    }

    private function setPrenom($pprenom){
        $this->prenom = $pprenom;
    }

    private function setAge($page){
        $this->age = $page;
    }

    public function getNom(){
        return $this->nom;
    }

    public function getPrenom(){
        return $this->prenom;
    }

    public function getAge(){
        return $this->age;
    }
}

class Avion
{
    // Attributs
    private $marque;
    private $puissance;
    private $couleur;
    private $lieuDepart;
    private $destination;

    // Methodes
    public function __construct($pmarque, $ppuissance, $pcouleur, $pDestination, $lieuAssemblage = "Everett")
    {
        $this->setMarque($pmarque);
        $this->setPuissance($ppuissance);
        $this->setCouleur($pcouleur);
        $this->setLieuDepart($lieuAssemblage);
        $this->setDestination($pDestination);
    }

    public function setMarque($pmarque){
        $this->marque = $pmarque;
    }

    public function setPuissance($ppuissance){
        $this->puissance = $ppuissance;
    }

    public function setCouleur($pcouleur){
        $this->couleur = $pcouleur;
    }

    public function setLieuDepart($lieuAssemblage){
        $this->lieuDepart = $lieuAssemblage;
    }

    public function setDestination(string $destination){
        if($destination){
            if($this->getDestination()!=""){
                $this->setLieuDepart($this->getDestination());
            }
            $this->destination = $destination;
        }
    }

    public function getMarque(){
        return $this->marque;
    }

    public function getPuissance(){
        return $this->puissance;
    }

    public function getCouleur(){
        return $this->couleur;
    }

    public function getLieuDepart(){
        return $this->lieuDepart;
    }

    public function getDestination(){
        return $this->destination;
    }

    public function CaracteristiquesAvion(){
        return "<ul>
                        <li>Marque : {$this->getMarque()} </li>
                        <li>Puissance : {$this->getPuissance()} </li>
                        <li>Couleur : {$this->getCouleur()} </li>
                        <li>Lieu de départ : {$this->getLieuDepart()} </li>
                        <li>Destination : {$this->getDestination()} </li>
                    </ul>";
    }
}

$VBleu = new Voiture("Peugeot", 150, "bleu");

echo $VBleu->CaracteristiquesVoiture()."<br>";

$CPetit1 = new Conducteur("PETIT", "Louis", 21);

echo "<p>Je me nomme {$CPetit1->getPrenom()} {$CPetit1->getNom()} et j'ai {$CPetit1->getAge()} ans.<br>";

echo "<p>Avions :</p>";

$ABoeing = new Avion ("Boeing", 737, "bleu","");

echo $ABoeing->CaracteristiquesAvion();

$ABoeing->setDestination("Londres");

echo $ABoeing->CaracteristiquesAvion();

$ABoeing->setDestination("Paris");

echo $ABoeing->CaracteristiquesAvion();