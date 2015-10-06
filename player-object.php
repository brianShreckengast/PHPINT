<?php
class Player {

	protected $name;

	protected $hand;

	protected $score;

	public function __construct($name){

		$this->name = $name;

		$this->hand = array();

		$this->score = 0;
	}
	//return player's name
	public function getName(){

		return $this->name;
	}

	public function addCard($card){

		$this->hand[] = $card;
	}

	public function showHand(){

		return $this->hand;
	}
	public function showScore(){

		return $this->score;
	}
	public function addToScore($points){

		$this->score += $points;
	}
	public function clearHand(){

		$this->hand = [];
	}

}

?>