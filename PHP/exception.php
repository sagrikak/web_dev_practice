<?php
//for catching more than one error
class ZeroException extends Exception
{
	public function showSpecific()
	{
		return 'Error on line '.$this->getLine().' in '.$this->getFile();
	}
} 
class LargeException extends Exception{}

$x = 5;
$y = 0;

try
{
	if($y==0)
	{
		throw new ZeroException('Cannot divide by zero.');
	}
	else if($x/$y > 1)
	{
		throw new LargeException("Value exceeds 1.", 1);
	}
	else echo $x/$y;
}
catch(ZeroException $ex)
{
	echo 'Error: '.$ex->showSpecific();
}
catch(LargeException $ex)
{
	echo 'Error: '.$ex->getMessage();
}


?>