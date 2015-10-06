<?php
class Card {
	

	private $allowedSuites = array('Heart', 'Diamond', 'Spade', 'Club');

	protected $suite;

	protected $rank;

	public function __construct($suite, $rank) {

		$this->suite = $suite;
		$this->rank = $rank;


	}

	public function checkSuite(){

		if (!in_array($this->suite, $this->allowedSuites)){

			throw new Exception(
				$this->suite.' is not allowed. You can pass: '.implode(', ', $this->allowedSuites));
		}
	}

	public function colorCard(){

		if ($this->suite  == 'Heart' || $this->suite  == 'Diamond'){

			return 'red';
		} else {

			return'black';
		}
	}

	public function createIcon(){

		switch($this->suite){

			case "Heart":
			return "&hearts;";
			break;

			case "Diamond":
			return "&diams;";
			break;

			case "Spade":
			return "&spades;";
			break;

			case "Club":
			return "&clubs;";
			break;
		}
	}

	public function getRank(){

		return $this->rank;
	}
	public function getSuite(){

		return $this->suite;
	}

	public function renderCard(){

		return '<span class = "'.$this->colorCard().'">'.$this->getRank().$this->createIcon()."</span>";

	}

}
?>