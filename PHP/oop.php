<?php

//naming standards
//Camelcase for public variables
//$_<var_name> for private variables
//$_T<var_name> for protected variables

class BankAccount
{
	public function __construct($amount)
	{
		$this->balance = $amount;
	}
	public function DisplayBalance()
	{
		echo 'Balance: '.$this->balance.'<br>';
		echo 'Interest: '.self::interest.'<br>';//accessing const variable inside the class
	}
	public function Withdraw($amount)
	{
		if($this->balance < $amount)
			echo 'Not enough funds.<br>';
		else
			$this->balance -= $amount;
	}
	public function Deposit($amount)
	{
		$this->balance += $amount;
	}
	public $balance;
	const interest = 5;
}


class SavingsAccount extends BankAccount
{
	public $type = '18-25';
}


echo 'Alex<br>';
$alex = new BankAccount(30);//new instance of class
$alex->Withdraw(12);
$alex->DisplayBalance(); 
$alex->Withdraw(2);
$alex->DisplayBalance(); 
$alex->Deposit(7);
$alex->DisplayBalance(); 
echo 'Interest: '.$alex::interest.'<br>';//displaying constants

echo 'Jim<br>';
$jim = new BankAccount(10);
$jim->Withdraw(12);
$jim->DisplayBalance(); 
$jim->Withdraw(2);
$jim->DisplayBalance(); 
$jim->Deposit(7);
$jim->DisplayBalance();

echo 'Savings<br>';
$alex_savings = new SavingsAccount(5); 
$alex_savings->Withdraw(12);
$alex_savings->DisplayBalance();
$alex_savings->Deposit(7);
$alex_savings->DisplayBalance(); 
echo $alex_savings->type.'<br>';  

?>

