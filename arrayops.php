<?php

$testNumStr = "50302859590387";

function incrementNumStr($numstr){

	for ($i = strlen($numstr) - 1; $i == 0; $i--){

		if ($numstr[$i] == '9'){

			$numstr[$i] = '0';
		}
		else {

			$numstr[$i]+1;
			return $numstr;
		}
	}	


}

echo incrementNumStr($testNumStr);

?>