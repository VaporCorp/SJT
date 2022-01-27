<?php

require_once 'vehicle.php';

class Plane extends Vehicle {
    public function __construct($brand, $power, $color, $illustration="", $area = 15){
        parent::__construct($brand, $power, $color, $illustration, $area);
    }
}

echo "<h1>Avions : </h1>";
$planeTest = new Plane ('Boeing', 540, 'White');
echo "<ul>".$planeTest->VehicleProperties()."</ul>";
$planeTest2 = new Plane ('Boeing', 570, 'Grey');
echo "<ul>".$planeTest2->VehicleProperties()."</ul>";
$planeTest3 = new Plane ('Boeing', 520, 'Brown');
echo "<ul>".$planeTest3->VehicleProperties()."</ul>";
$planeTest4 = new Plane ('Boeing', 480, 'Yellow');
echo "<ul>".$planeTest4->VehicleProperties()."</ul>";
$planeTest5 = new Plane ('Boeing', 650, 'Red');
echo "<ul>".$planeTest5->VehicleProperties()."</ul>";