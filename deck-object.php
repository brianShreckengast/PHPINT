<?php
class Deck {

	protected $cards = array();

	public function __construct(){

		$this->makeDeck();

	}
	protected function makeDeck(){

		$suites = ['Heart', 'Diamond', 'Spade', 'Club'];
		//array of special cards
		$royals = ['Jack', 'Queen', 'King', 'Ace'];
		//loop through each suite
		foreach ($suites as $suite) {

			//Add number cards to deck
			for ($i = 2; $i < 11; $i++){

				$this->cards[] = new Card($suite, $i);
			

			}
			//Add royals to deck
			foreach ($royals as $royal){

				$this->cards[] = new Card($suite, $royal);
			}

		}
	}

	public function countCards(){

		return count($this->cards);
	}

	public function shuffle(){

		shuffle($this->cards);
	}

	public function getCard(){
		//Make sure there are any cards to deal
		if( (count($this->cards)) > 0) {

			return array_pop($this->cards);
		} else {

			//If out of cards, throw an exception
			throw new Exception('End of deck');
		}
	}

}
?>