<?php

/**
*
*/

function pre($data, $name = null){

	if (!empty($name)){
		if (php_sapi_name() == 'cli'){

			echo "\n";
			echo "-------------\n";
			echo $name . "\n";
			echo "-------------\n";
		} else {
		echo '<h3>'.$name.'</h3>';
	}

	}
	if (is_object($data) || is_array($data)){

		echo "<pre>";
		print_r($data);
		echo "<pre>";
	}
	else {

		echo $data;
	}
}

$myarray = ['dogs', 'cats', 'penguins'];

pre ($myarray, "Title!");

?>