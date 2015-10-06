<?php

class Dealer {

	protected $cardsToDeal;

	protected $players = array();

	protected $gameDeck;

	public function __construct($cardsToDeal, $playerNames){

		$this->cardsToDeal = $cardsToDeal;

		$this->createPlayers($playerNames);

		$this->createGameDeck();

		$this->playGame();
	}

	protected function createPlayers($names){

		foreach($names as $player){
			//create a player of that name
			$player = new Player($player);
			//add player to players array
			$this->players[] = $player;
		}
	}

	protected function createGameDeck(){
		
		//create a deck of cards for the game
		$this->gameDeck = new Deck();
	}

	protected function cardPoints($card){

		if (intval($card->getRank())){
			//If it's an integer, return that int value
			return intval($card->getRank());
		
		}
		else {
			//It's not an int so must be royal, look up point value and return
			switch($card->getRank()){

				case 'Ace':
					return 1;
					break;
				case 'Jack':
					return 11;
					break;
				case 'Queen':
					return 12;
					break;
				case 'King':
					return 13;
					break;
				} // end of case
		}//end of else
		
	}//end of cardpoints function

	protected function scoreHand($hand){
		//initialize variable to hold round's score
		$roundScore = 0;
		//loop through cards in hand
		foreach ($hand as $card){
			//add points value of card to round score
			$roundScore += $this->cardPoints($card);
		}
		
		return $roundScore;
	}
	protected function isRoyal($playerHand){
		//set royal flag to false
		$royal = false;
		$royalCount = 0;
		$cardCount = count($playerHand);
		//loop through cards and check if they're royal
		//if playing 5 or more cards, 10 counts as royal, so set min threshold to 10
		if($cardCount >= 5){

			$min = 10;
		}
		else {

			$min = 11;
		}
		//loop through hand to check if card is Ace or above min threshold
		foreach($playerHand as $card){

			$cardVal = $this->cardPoints($card);
			if($cardVal == 1 || $cardVal >= $min){

				$royalCount++;
			}
		}
		//if royalcount is as large as card count, it's royal!
		if ($royalCount == $cardCount){

			$royal = 'true';
		}
		
		return $royal;

	}

	protected function isFlush($playerHand){

		//set flush flag to false
		$flush = false;
		//get the suite of the first card
		$suite = $playerHand[0]->getSuite();
		//initialize counter variable to count cards in this suite 
		$countInSuite = 0;
		foreach ($playerHand as $card){
			//if card is in suite of first card, add to counter
			if($card->getSuite() == $suite){

				$countInSuite++;
			}
		}
		//check if they're all of same suite
		if($countInSuite == count($playerHand)){

			//it's a flush!
			$flush = true;
		}
		return $flush;

	}

	protected function isStraight($playerHand){

		//set straight flag to false
		$straight = false;
		//create array to hold card values
		$cardVals = array();
		//add card values to array
		foreach ($playerHand as $card){

			$cardVals[] = $this->cardPoints($card);
		}
		//sort the array
		sort($cardVals);
		//count number of cards
		$cardCount = count($cardVals);
		//check if King and Ace in sequence
		if($cardVals[0] == 1 && $cardVals[$cardCount-1] == 13){

			//if only two cards, it's a straight
			if($cardCount == 2){

				$straight = 'true';
			}
			elseif($cardCount == 3 && ($cardVals[1] == 2 || $cardVals[1] == 12)){

				$straight = 'true';
			}
			else {

				$sequenceCount = 0;
				for ($i = 1; $i <= $cardCount-2; $i++){

					if( ($cardVals[$i] - $cardVals[$i - 1]) == 1){

						$sequenceCount++;
					}
				}
				if($sequenceCount == $cardCount - 2){

					$straight = 'true';
				}
			} 
		}
		else {

			$sequenceCount = 0;
				for ($i = 1; $i <= $cardCount-1; $i++){

					if( ($cardVals[$i] - $cardVals[$i - 1]) == 1){

						$sequenceCount++;
					}
				}
				if($sequenceCount == $cardCount - 1){

					$straight = 'true';
				}

		}

	return $straight;

	}

	protected function renderPlayerHand($player, $roundScore, $royalFlag, $flushFlag, $straightFlag){

		echo "<div class = 'scoreCard'><p>".$player->getName()."'s Hand:</p>";
		echo "<table><tr><th>Card</th><th>Points</th></tr>";
		//loop through hand to print out cards
		foreach($player->showHand() as $card){

			echo "<tr><td>".$card->renderCard()."</td><td>".$this->cardPoints($card)."</td></tr>";
		}
		echo "</table>";
		//if it's royal, say so
		if($royalFlag){

			echo "<p class = 'royal'>Royal! +10 Points.</p>";
		}
		//If it's a flsuh, say so
		if($flushFlag){

			echo "<p class = 'flush'>Flush! 2x Points.</p>";
		}
		//If it's a straight, say so
		if($straightFlag){

			echo "<p class = 'straight'>Straight! 3x Points.</p>";
		}
		//display round's score and total score
		echo "<p>Score this round: ".$roundScore."</p>";
		echo "<p>Total score: ".$player->showScore()."</p>";
		echo "</div>";
	}

	protected function playRound(){

		//create a new div to hold scoreCards
		echo "<div class = 'round'>";
		//deal cards to players
			foreach ($this->players as $player){

				for($i = 1; $i <= $this->cardsToDeal; $i++){

					$player->addCard($this->gameDeck->getCard());

				}
			}

			//Score each player's hand
			foreach ($this->players as $player){

				//calculate score for round
				$roundScore = $this->scoreHand($player->showHand());
				//check if it's royal
				$isRoyal = $this->isRoyal($player->showHand());
				if($isRoyal){

					$roundScore = $roundScore + 10;
				}
				//check if it's a flush
				$isFlush = $this->isFlush($player->showHand());
				if($isFlush){

					$roundScore = $roundScore * 2;
				}
				//check if it's a straight
				$isStraight = $this->isStraight($player->showHand());
				if($isStraight){

					$roundScore = $roundScore * 3;
				}
				//add round's score to player's total score
				$player->addToScore($roundScore);
				//render the player's hand to screen, pass in player, round score, flush
				$this->renderPlayerHand($player, $roundScore, $isRoyal, $isFlush, $isStraight);

				//clear player's hand for next round
				$player->clearHand();
			}
		//close round's div
		echo "</div>";
	}

	protected function findWinner($players){

		//Set max to 0
		$max = 0;
		//Loop through list of players
		foreach($players as $player){
			//access player's score
			$playerScore = $player->showScore();
		
			//If player's score is bigger than max, set player's score to max and player to winner
			if ($playerScore > $max) {

				$max = $player->showScore();

				$winner = $player->getName();
			}
		}
		return $winner;
	}

	protected function playGame(){

		echo "Game on!";

		//shuffle the deck
		$this->gameDeck->shuffle();

		//set round to 1
		$round = 1;
		//Play rounds while there are enough cards in deck to do so
		while ((count($this->players)*($this->cardsToDeal)) <= $this->gameDeck->countCards()){
		
			echo "<h3>Round $round</h3>";
			$this->playRound();
			$round++;
		}

		$gameWinner = $this->findWinner($this->players);
		echo "<h2>".$gameWinner." wins the game!</h2> ";
	}


}
?>