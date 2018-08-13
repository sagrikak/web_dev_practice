<?php

$db = new PDO('mysql:host=localhost;dbname=example;charset=utf8mb4', 'sk', 'up85k3650');

if(isset($_POST['search_name']))
{
	$search_name = $_POST['search_name'];
	if(!empty($search_name))
	{
		$query = "SELECT `name` FROM `names_list` WHERE `name` LIKE '%".$search_name."%'";
		$result = $db->query($query);
		echo $result->rowCount().' names match your search.<br>';
		foreach ($result as $row) {
			for($i=0; $i<sizeof($row); $i++)
				echo $row[$i].' ';
			echo '<br>';
		}
	}
	else echo 'Please enter a keyword.<br>';
}

?>

<form action="search_engine.php" method="POST">
	Name: <input type="text" name="search_name"> <input type="submit" value="Search">
</form>