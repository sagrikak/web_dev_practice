<?php

require 'current.php';
require 'connect.php';

if(loggedin())
{
	echo 'You\'re logged in.<br>';
	echo 'Welcome '.getfield('firstname', $db).' '.getfield('surname', $db).'.<br>'; 
	include 'logout.php';
}
else
{
	include 'loginform.php';
	echo 'Haven\'t registered yet?<br>';
	echo '<a href="register.php">Register Now</a>';
}

?>