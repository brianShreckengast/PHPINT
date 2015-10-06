<?php

/*class Person {
	
	public $name;

	public $age;

	public $location;

	protected $socialSecurityNumber;

	private $bankAccountNumber;

	function isThisPersonCool(){

		if($this->location == 'Austin'){

			return "Yeah you are cool";

		} else {

			return "No you are not don't move here";
		}
	}

}

$chelsea = new Person();

$chelsea->name = "Chelsea";
$chelsea->age = 24;
$chelsea->location = "Austin";

$samir = new Person();

$samir->name = "Samir";
$samir->age = 31;
$samir->location = "Austin";


echo "<pre>";

var_dump($chelsea, $samir);

echo $samir->isThisPersonCool();*/

/*class PlayingCard {

	public $suite;

	public $rank;

	public function __construct($suite, $rank){

		$this->suite = $suite;

		$this->rank = $rank;
	}
}

$aceofspades = new PlayingCard('Spades', 'Ace');

var_dump($aceofspades);*/

/*class Animal {

	public $name;

	public $hasHair;

	protected $isWealthy;
}

class Human extends Animal {

	public function checkWealth(){

		//If they person is wealkthy, say they are, or not otherwise
		if($this->isWealthy){

			return "Yeah you're doing good";
		} else {

			return 'Do more work!';
		}
	}
}

$dog = new Animal();

$dog->name = 'Max';

$dog->hasHair = true;

$brian = new Human ($isWealthy = true);

$brian->checkWealth();*/

class BankAccount {

	/**
	*Name of the person who owns the account
	* @var string
	*/
	public $owner;

	/**
	*How much money this person has
	*@var float
	*/
	public $bankBalance;

	public function deposit($amount){

		$this->bankBalance += $amount;

		return $this->bankBalance;
	}

	public function withdraw($amount){

		if ($this->bankBalance >= $amount){

			$this->bankBalance -= $amount;

			return $this->bankBalance;
		} else {

			throw new Exception('Insufficient funds');
		}

		

		
	}
}

try {
$myAccount = new BankAccount();
$myAccount->owner = 'Samir';
$myAccount->bankBalance = 200;

$myAccount->deposit(10);
$myAccount->withdraw(300);
} catch (Exception $e){

	echo 'An error occurred: '.$e->getMessage();
}

echo "<pre>";
var_dump($myAccount);



?>