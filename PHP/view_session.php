<?php

session_start();

echo 'Welcome, '.$_SESSION['username'].'.<br>You are '.$_SESSION['age'].' years old.<br>';

echo $_COOKIE['username'].'<br>';

?>