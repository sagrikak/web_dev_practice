<?php

$db = new PDO('mysql:host=localhost;dbname=example;charset=utf8mb4', 'sk', 'up85k3650');

$user_ip = $_SERVER['REMOTE_ADDR'];

ip_exists($db);

function view_hit($db)
{
	foreach ($db->query("SELECT * FROM `hit_counter`") as $count) {
		for ($i=0; $i < sizeof($count); $i++) { 
			echo $count[$i].' ';
		}
		echo '<br>';
	}
	echo '<br>';
}

function view_ip($db)
{
	foreach ($db->query("SELECT * FROM `hits_ip`") as $ip) {
		for ($i=0; $i < sizeof($ip); $i++) { 
			echo $ip[$i].' ';
		}
		echo '<br>';
	}
	echo '<br>';
}

function ip_exists($db)
{
	global $user_ip;
	echo $user_ip.'<br>';
	$check_ip = $db->query("SELECT `IP` FROM `hits_ip` WHERE `IP` = '$user_ip'")->rowCount();
	echo 'Checking IP<br>';
	if($check_ip == 1)
	{
		echo 'IP found';
	}
	else
	{
		echo 'IP not found<br>';
		ip_add($user_ip, $db);
	}
}

function ip_add($ip, $db)
{
	global $user_ip;
	echo 'Adding IP<br>';
	$db->query("INSERT INTO `hits_ip` VALUES ('$user_ip')");
	view_ip($db);
	update_count($db);
}

function update_count($db)
{
	foreach ($db->query("SELECT * FROM `hit_counter`") as $count) {
		$cur_count = $count[0];
	}
	$cur_count++;
	//echo $cur_count;
	echo 'Updating Counter<br>';
	$db->query("UPDATE `hit_counter` SET `Count` = '$cur_count'");
	view_hit($db);
}

?>