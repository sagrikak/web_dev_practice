<?php
//sessions are closed as soon as the browser is closed and the connection is closed with a server
session_start();//at the top of the page
$_SESSION['username'] = 'SK'; 
$_SESSION['age'] = '21';

//cookies can be used to store data about a particular user for much longer times
$time = time();
setcookie('username', 'SK', time()+100);//make the cookie last for 100 seconds

?>