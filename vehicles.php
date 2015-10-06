<?php

class Vehicle {
	
	public $wheels;
	public $hydraulics;
	public $brand;

	private $vin;
}

class SUV extends Vehicle {
	
	public $name;
	public $price;
}


function makeSUV(){

	$Jeep = new SUV();
	$Jeep->name = "Jeep";
	$Jeep->wheels = "Offroad";

	return $Jeep;
}

$myJeep = makeSUV();
echo "Jeep Info ".$myJeep->name." ".$myJeep->wheels."\n";

?>