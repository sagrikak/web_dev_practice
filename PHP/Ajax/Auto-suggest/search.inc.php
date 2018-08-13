<?php

require 'connect.php';

if(isset($_GET['search_text']) && !empty($_GET['search_text']))
{
	$search_text = $_GET['search_text'];
	$query = "SELECT `Name` FROM `names_list` WHERE `Name` LIKE '$search_text%'";
	$result = $db->query($query);
	foreach ($result as $row) {
		echo $row['Name'].'<br>';
	}
}

?>