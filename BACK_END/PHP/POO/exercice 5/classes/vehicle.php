<?php

class Vehicle{
    // Attributes
    private string $brand;
    private int $power;
    private string $color;
    private int $area;
    private string $illustration;

    // Methods
    public function __construct($brand, $power, $color, $area, $illustration = ""){
        $this->setAllAttributes($brand, $power, $color, $area, $illustration);
    }

    public function VehicleProperties(): string
    {
        $htmlString = '<ul>';
        foreach ($this as $key => $propriete){
            if(isset($propriete)){
                $htmlString.= "<li><strong>$key:</strong> $propriete</li>";
            }
        }
        $htmlString .= '</ul>';
        return $htmlString;
    }

    private function setAllAttributes($brand, $power, $color, $area, $illustration){
        $this->brand = $brand;
        $this->power = $power;
        $this->color = $color;
        $this->area = $area;
        $this->illustration= $illustration;
    }

    private function getVehicleBrand():string{
        return $this->brand;
    }

    private function getVehiclePower():int{
        return $this->power;
    }

    private function getVehicleColor():string{
        return $this->color;
    }

    public function getVehicleArea():int{
        return $this->area;
    }
}