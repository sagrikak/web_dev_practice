<?php

session_start();

if(!isset($_POST['secure']))
{
	$_SESSION['secure'] = rand(1000, 9999);
}
else
{
	if($_SESSION['secure'] == $_POST['secure'])
		echo 'A match!';
	else
	{
		echo 'Incorrect! Try again.';
		$_SESSION['secure'] = rand(1000, 9999);
	}
}

?>
<br>
<img src="grnerate.php" /><br>

<form action="index.php" method="POST">
	Type the value you see: <input type="text" name="secure" size="6"><br>
	<input type="submit" value="Submit">
</form>