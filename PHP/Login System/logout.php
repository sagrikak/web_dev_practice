<?php

if(isset($_POST['logout']))
{
	session_destroy();
	header('Location: '.$http_referer);
}

?>
<br>
<form action="<?php echo $cur_file; ?>" method="POST">
	<input type="submit" value="Log Out" name="logout">
</form>