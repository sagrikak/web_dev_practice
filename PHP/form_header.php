<?php
$script = $_SERVER['SCRIPT_NAME']
?>

<form action="<?php echo $script;?>" method="POST">
	Name: <input type="text" name="user_name"><br><br>
	<textarea name="user_input" rows="10" cols="10"></textarea><br><br>
	<input type="submit" value="submit">
</form>