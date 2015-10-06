<?php

$users = array(
	array(
		'id' => 123,
		'name' => 'Samir',
		'location' => 'Austin'
		),
	array(
		'id' => 789,
		'name' => 'Chris',
		'location' => 'Austin'
		)
	);

echo "<table><tr><td>id</td><td>Name</td><td>Location</td></tr>";

$rowcount = 1;

foreach ($users as $user){

	
	if ($rowcount % 2 == 0){

		echo "<tr>"; }
	else {

		echo '<tr style = "color:red;">';
	}
	
	echo "
				<td>".$user['id']."</td>
				<td>".$user['name']."</td>
				<td>".$user['location']."</td>
			</tr>";

	$rowcount++;
}

echo "</table>";

?>