<?php
//insert data into table using ajax and post variables
require 'connect.php';

if(isset($_POST['text']) && !empty($_POST['text']))
{
	$text = $_POST['text'];
	$query = "INSERT INTO `data` VALUES (NULL,'$text')";
	if($db->query($query))
		echo 'Data Inserted.';
}

?>