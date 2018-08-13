<?php

session_start();
unset($_SESSION['username']);//unsetting one session
session_destroy();//unsetting all sessions

setcookie('username', 'SK', time()-100);//unsetting a cookie

?>
