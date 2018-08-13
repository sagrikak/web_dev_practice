<?php

ob_start();
session_start();
$cur_file = $_SERVER['SCRIPT_NAME'];
if (isset($_SERVER['HTTP_REFERER']) && !empty($_SERVER['HTTP_REFERER'])) {
	$http_referer = $_SERVER['HTTP_REFERER'];
}

function loggedin()
{
	if(isset($_SESSION['user_id']) && !empty($_SESSION['user_id']))
		return true;
	else return false;
}

function getfield($field, $db)
{
	$query = "SELECT `$field` FROM `users_db` WHERE `id` = '".$_SESSION['user_id']."'";
	$row = $db->query($query)->fetchAll();
	return $row['0'][$field];
}

?>