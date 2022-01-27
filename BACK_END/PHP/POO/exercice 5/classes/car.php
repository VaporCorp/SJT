<?php

require_once 'vehicle.php';

class Car extends Vehicle {
    public function __construct($brand, $power, $color, $illustration = "", $area = 2)
    {
        parent::__construct($brand, $power, $color, $area, $illustration);
    }
}

echo "<h1>Voitures : </h1>";
$carTest = new Car(
    'Porsche',
    540,
    'Grey',
    '<br><img src="https://auto.cdn-rivamedia.com/photos/annonce/big/porsche-911--991-carrera--inclus-carte-grise-malus-ecologique-et-livraison-a-votre-domicile-122001667.jpg" width="200px" height="150px">');
echo "<ul>".$carTest->VehicleProperties()."</ul>";
$carTest2 = new Car(
    'Lamborghini',
    590,
    'Yellow',
    '<br><img src="https://www.sportauto.fr/wp-content/uploads/sportauto/2020/11/Lamborghini_Huracan_Evo_RWD_2020_4ab9d-1-615x410.jpg" width="200px" height="150px">');
echo "<ul>".$carTest2->VehicleProperties()."</ul>";
$carTest3 = new Car(
    'Ferrari',
    480,
    'Red',
    '<br><img src="https://sf1.autoplus.fr/wp-content/uploads/autoplus/2021/01/ferrari-connaissez-vous-tous-les-rouges-marque.jpeg" width="200px" height="150px">');
echo "<ul>".$carTest3->VehicleProperties()."</ul>";
$carTest4 = new Car(
    'BMW',
    375,
    'Blue',
    '<br><img src="https://sf1.sportauto.fr/wp-content/uploads/sportauto/2020/11/BMW_M2_CS_2019_21bc4.jpg" width="200px" height="150px">');
echo "<ul>".$carTest4->VehicleProperties()."</ul>";
$carTest5 = new Car(
    'Mercedes',
    540,
    'Black',
    '<br><img src="https://www.tuningblog.eu/wp-content/uploads/2020/11/Mercedes-E300L-Chiptuning-AMG-Style-8.jpg" width="200px" height="150px"');
echo "<ul>".$carTest5->VehicleProperties()."</ul>";