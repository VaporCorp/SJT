<?php

require_once 'car.php';
require_once 'truck.php';
require_once 'plane.php';

class garage{
    // Attributes
    private int $area;
    private array $vehicles;
    private int $occupiedArea;

    // Methods
    public function __construct($area, $vehicles=[]){
        $this->area = $area;
        $this->vehicles= $vehicles;
        $this->occupiedArea = 0;
    }

    public function addVehicle($vehicle):void{
        if(!is_a($vehicle,Vehicle::class)){
            return;
        }
        if(is_a($vehicle, Car::class)){
            if ($this->getFreeArea()>$vehicle->getVehicleArea()){
                $this->occupiedArea = $this->getOccupiedArea()+$vehicle->getVehicleArea();
                $this->vehicles[] = $vehicle;
            }
            else {
                echo "Impossible d'ajouter une nouvelle voiture, espace disponible inférieur à {$vehicle->getVehicleArea()}m²<br>";
            }
        }
        elseif(is_a($vehicle,Truck::class)){
            if ($this->getFreeArea()>$vehicle->getVehicleArea()){
                $this->occupiedArea = $this->getOccupiedArea()+$vehicle->getVehicleArea();
                $this->vehicles[] = $vehicle;
            }
            else {
                echo "Impossible d'ajouter un nouveau camion, espace disponible inférieur à {$vehicle->getVehicleArea()}m²<br>";
            }
        }
        elseif(is_a($vehicle,Plane::class)){
            if($this->getFreeArea()>$vehicle->getVehicleArea()){
                $this->occupiedArea = $this->getOccupiedArea()+$vehicle->getVehicleArea();
                $this->vehicles[] = $vehicle;
            }
            else{
                echo "Impossible d'ajouter un nouvel avion, espace disponible inférieur à {$vehicle->getVehicleArea()}m²<br>";
            }
        }
        else {
            echo "Probleme";
        }
    }

    private function getGarageArea():int{
        return $this->area;
    }

    private function getOccupiedArea():int{
        return $this->occupiedArea;
    }

    public function getFreeArea():int{
       return (($this->getGarageArea())-($this->getOccupiedArea()));
    }

    public function getGarageInfo($vehicle = false){
        if($this->vehicles===[]){
            return;
        }
        if($vehicle){
            echo "<h2>Véhicule précis : </h2>";
            return $vehicle->vehicleProperties();
        }
        else {
            echo "<h2>Vehicules présents dans le garage : </h2>";
            foreach($this->vehicles as $uniqueVehicle){
                echo $uniqueVehicle->vehicleProperties()."<br>";
            }
        }
    }

    public function deleteVehicle($vehicle = false): void {
        if(!$vehicle){
            unset($this->vehicles);
            $this->vehicles= [];
            $this->occupiedArea = 0;
            return;
        }
        if(in_array($vehicle, $this->vehicles, true)){
            $this->occupiedArea -= $vehicle->getVehicleArea();
            array_splice($this->vehicles, array_search($vehicle, $this->vehicles, true), 1);
        }
        else {
            echo "Problème lors de la suppression du véhicule";
        }
    }
}

$testGarage = new Garage(50);
$testGarage->addVehicle($carTest);
echo $testGarage->getGarageInfo();
echo "<br>";
$testGarage->addVehicle($carTest2);
echo $testGarage->getGarageInfo();
echo "<br>";
echo $testGarage->getGarageInfo($carTest2);
echo "<br>";
$testGarage->addVehicle($newTruck);
$testGarage->addVehicle($newTruck2);
$testGarage->addVehicle($newTruck3);
$testGarage->addVehicle($newTruck4);
$testGarage->addVehicle($newTruck5);
echo $testGarage->getGarageInfo();
echo "<br>";
$testGarage->deleteVehicle($newTruck3);
echo $testGarage->getGarageInfo();
echo "<br>";
$testGarage->deleteVehicle();
echo $testGarage->getGarageInfo();
echo "<br>";

echo "<h1>Nouveau garage suite : </h1>";
$garageExercice = new Garage(50);
$garageExercice->addVehicle($carTest);
$garageExercice->addVehicle($carTest2);
$garageExercice->addVehicle($carTest3);
$garageExercice->addVehicle($newTruck);
$garageExercice->addVehicle($newTruck2);
$garageExercice->addVehicle($planeTest);
echo $garageExercice->getGarageInfo();
echo $garageExercice->getFreeArea()."m² libres";
echo "<br>";
$garageExercice->deleteVehicle($planeTest);
$garageExercice->deleteVehicle($newTruck);
echo $garageExercice->getGarageInfo();
echo $garageExercice->getFreeArea()."m² libres";
echo "<br>";
