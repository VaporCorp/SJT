<?php

require_once 'vehicle.php';

class Truck extends Vehicle {
    // Attributes
    private int $trailerCapacity;

    // Methods
    public function __construct($brand, $power, $color, $trailerCapacity, $illustration = "", $area = 10)
    {
        parent::__construct($brand, $power, $color, $illustration, $area);
        $this->trailerCapacity = $trailerCapacity;
    }

    public function truckProperties(){
        $vehicleProperties = parent::VehicleProperties();
        return $vehicleProperties."<li>Capacité de remorque : {$this->getTrailerCapacity()} </li>";
    }

    private function getTrailerCapacity(){
        return $this->trailerCapacity;
    }
}

echo "<h1>Camions : </h1>";
$newTruck = new Truck('Scania', 500, 'Rouge', 30000);
echo $newTruck->truckProperties();
$newTruck2 = new Truck('Scania', 500, 'Bleu', 30000);
echo $newTruck2->truckProperties();
$newTruck3 = new Truck('Scania', 500, 'Jaune', 30000);
echo $newTruck3->truckProperties();
$newTruck4 = new Truck('Scania', 500, 'Vert', 30000);
echo $newTruck4->truckProperties();
$newTruck5 = new Truck('Scania', 500, 'Vert', 30000);
echo $newTruck5->truckProperties();
