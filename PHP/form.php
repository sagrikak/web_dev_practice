<?php
	$redirect = false;
	if($redirect == true)
		header('Location: first.php');//redirect the page to first.php//cannot have any output before it
	include 'form_header.php';
	if(isset($_POST['user_name']) && !empty($_POST['user_name']))//isset checks if the form has been submitted
	{
		$user_name = htmlentities($_POST['user_name']);//htmlentities stops the script from processing html tags occuring in the input  
		echo strtolower($user_name).'<br>';
		if(strtolower($user_name) == 'alex')
			echo 'You are the best '.$user_name.'<br>';
	}
	$find = array('shit', 'fuck', 'damn');
	$replace = array('s##t', 'f##k', 'd##n');
	if(isset($_POST['user_input']) && !empty($_POST['user_input']))
	{
		$user_input = htmlentities($_POST['user_input']);
		echo str_ireplace($find, $replace, $user_input).'<br>';//ireplace works both for lowercase and uppercase letters
	}
?>
