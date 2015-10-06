<html>
<head>
	<style>

		.scoreCard {

			float:left;
			margin-left:10px;
			width:200px;
		}
		td {
			padding:5px;
			width:20px;
		}
		.round {
			float:left;
			width:100%;
		}
		.round p {

			clear:both;
		}
		.red {

			color: red;
		}
		.flush {

			color: blue;
			font-weight: bold;
		}
		.straight {

			color: orange;
			font-weight: bold;
		}
		.royal {

			color: purple;
			font-weight: bold;
		}

	</style>
</head>
<body>
	<h1>An Even Better Card Game!</h1>
	<form action ="object-oriented-card-game.php" method ="POST">
		<p>Enter the players' names, seperated by columns:</p>
		<input type = "text" name ="playerNames" value ="Enter Names" width= 100>
		<p>How many cards should I deal each round?</p>
		<input type = "text" name ="numberCards" width= 100>
		<br>
		<input type ="submit" name ="submit" value ="Play!">
	</form>

<?php

//include object files
include('card-object.php');
include('deck-object.php');
include('player-object.php');
include('dealer-object.php');



//Make sure these was a submission
if ($_SERVER['REQUEST_METHOD'] == 'POST'){

	//Make sure more than one player was entered as well as a card count as int
	if(substr_count($_POST['playerNames'],",")){

		if (intval($_POST['numberCards'])){

			//Turn submission string into an array
			$players = explode(",",$_POST['playerNames']);
			//convert numberCards to an int
			$numberCards = (integer) $_POST['numberCards'];
			
				$game = new Dealer($numberCards, $players);

				echo '<form action ="object-oriented-card-game.php" method ="POST">';
				echo "<input type = 'hidden' name ='playerNames' value ='".$_POST['playerNames']."'>";
				echo "<input type = 'hidden' name ='numberCards' value ='".$_POST['numberCards']."'>";
				echo '<input type ="submit" name ="submit" value ="Play Again!">';
				echo "</form>";

		} else {
			//Player did not enter a number of cards
			echo "Please enter a number of cards";
		}

	} else {
		//Player did not add at least two comma-seperated characters
		echo "Please Enter More Players";
	}
}




?>

</body>
</html>