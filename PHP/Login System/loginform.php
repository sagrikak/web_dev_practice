<?php

if(isset($_POST['username']) && isset($_POST['password']))
{
	if(!empty($_POST['username']) && !empty($_POST['password']))
	{
		//echo $_POST['username'].'<br>';
		//echo $_POST['password'];
		$user = strtolower($_POST['username']);
		$pass = md5($_POST['password']);
		$result = $db->query("SELECT * FROM `users_db` WHERE `username` = '$user' && `password` = '$pass'");
		$row = $result->fetchAll();
		$user_id = $row['0']['id'];
		if($result->rowCount() == 1)
		{
			$_SESSION['user_id'] = $user_id;
			header('Location: index.php');
		}
		else echo 'Incorrect username or password.<br>';
	}
	else echo 'Please enter both username and password.<br>';
}

?>

<form action="<?php echo $cur_file; ?>" method="POST">
	Username: <input type="text" name="username"><br><br>
	Password: <input type="password" name="password"><br><br>
	<input type="submit" value="Log In">
</form>