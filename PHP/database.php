<?php

$example_db = new PDO('mysql:host=localhost;dbname=example;charset=utf8mb4', 'sk', 'up85k3650');

function view_db($example_db)
{
	foreach ($example_db->query("SELECT * FROM users") as $user) {
		for ($i=0; $i < sizeof($user); $i++) { 
			echo $user[$i].' ';
		}
		echo '<br>';
	}
	echo '<br>';
}

if($example_db != NULL)
	echo 'Connected<br>';

foreach ($example_db->query("SELECT * FROM users") as $user) {
	echo $user['id'].' '.$user['username'].' '.$user['password'].'<br>';
}
echo '<br>';

foreach ($example_db->query("SELECT * FROM users ORDER BY id DESC") as $user) {
	for ($i=0; $i < sizeof($user); $i++) { 
		echo $user[$i].' ';
	}
	echo '<br>';
}
echo '<br>';

$rows = $example_db->query("SELECT id, username FROM users WHERE id%2 = 0 ORDER BY id DESC LIMIT 1");
echo $rows->rowCount().' rows have been fetched.<br>';

foreach ($rows as $user) {
	for ($i=0; $i < sizeof($user); $i++) { 
		echo $user[$i].' ';
	}
	echo '<br>';
}
echo '<br>';

$example_db->query("UPDATE users SET password = 'passwd' WHERE password != 'passwd'");

if($example_db->query("SELECT * FROM users WHERE username = 'Eric'")->rowCount() < 1)
{
	$example_db->query("INSERT INTO users VALUES (NULL, 'Eric', 'passwd')");
	view_db($example_db);
} 
else if($example_db->query("SELECT * FROM users WHERE username = 'Eric'")->rowCount() > 1)
{
	$example_db->query("DELETE FROM users WHERE username = 'Eric'");
	$example_db->query("ALTER TABLE users AUTO_INCREMENT = 1");
	view_db($example_db);
}

?>