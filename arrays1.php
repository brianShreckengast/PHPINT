<?php

$pets = ['dog', 'cat', 'beast'];
$flowers = ['rose', 'sunflower', 'mayflower'];


$merged = array_merge($pets, $flowers);

echo "<pre>";
print_r($merged);
echo "</pre>";

sort($merged);

echo "<pre>";
print_r($merged);
echo "</pre>";


echo count($merged)."<br>";

if (in_array('dog', $merged)){

	echo "Found it!";
}

/*$data = "Samir,Austin,31,Loves Dogs,Does not love cockroaches";

$dataArray = explode(",",$data);

echo "<pre>";
print_r($dataArray);
echo "</pre>";

$newData = array('coffee', 'juice', 'yerba mate');

echo implode(".___.", $newData);*/


?>