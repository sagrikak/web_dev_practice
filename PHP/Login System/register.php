<?php

require 'current.php';
require 'connect.php';

if(!loggedin())
{
	if(isset($_POST['username']) &&
	isset($_POST['password']) &&
	isset($_POST['password2']) &&
	isset($_POST['firstname']) &&
	isset($_POST['lastname']))
	{
		$username = strtolower($_POST['username']);
		$password = md5($_POST['password']);
		$password2 = md5($_POST['password2']);
		$firstname = $_POST['firstname'];
		$lastname = $_POST['lastname'];
		if(!empty($username) && !empty($password) && !empty($password2) && !empty($firstname) && !empty($lastname))
		{
			if(strlen($username)>30 || strlen($firstname)>40 || strlen($lastname))
			{
				echo 'Please adhere to max values of fields.<br>';
			}
			else
			{
				if($password == $password2)
				{
					$query = "SELECT `username` from `users_db` WHERE `username` = '$username'";
					$result = $db->query($query)->rowCount();
					if($result == 0)
					{
						$db->query("INSERT INTO `users_db` VALUES(NULL, '".$username."', '".$password."', '".$firstname."', '".$lastname."')");
						header('Location: register_success.php');
					}
					else echo 'This username already exists.<br>';
				}
				else echo 'Passwords do not match.<br>';
			}
		}
		echo 'All fields are required.<br>';
	}
?>

<form action="register.php" method="POST">
	Username:<br> <input type="text" name="username" maxlength="30" value="<?php if(isset($username)) echo $username; ?>"><br><br>
	Password:<br> <input type="password" name="password"><br><br>
	Enter password again:<br> <input type="password" name="password2"><br><br>
	First Name:<br> <input type="text" name="firstname" maxlength="34" value="<?php if(isset($firstname)) echo $firstname; ?>"><br><br>
	Last Name:<br> <input type="text" name="lastname" maxlength="40" value="<?php if(isset($lastname)) echo $lastname; ?>"><br><br>
	<input type="submit" value="Register">
</form>

<?php	
}
else
{
	echo 'You\'re already registered.<br>';
}

?>

