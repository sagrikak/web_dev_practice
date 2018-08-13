<?php

$name = $_FILES['uploaded_file']['name'];
$size = $_FILES['uploaded_file']['size'];
$type = $_FILES['uploaded_file']['type'];
$tmp_name = $_FILES['uploaded_file']['tmp_name'];//temporary location of file on server
$extension = strtolower(substr($name, strpos($name, '.')+1));
$max_size = 2097152;

if(isset($name))
{
	if(!empty($name))
	{
		if(($extension=='jpg' || $extension=='jpeg') && ($type=='image/jpeg' || $type=='image/jpg'))
		{
			if($size<=$max_size)
			{
				$location = 'Uploaded/';
				//echo $name.'<br>'.$size.'<br>'.$type.'<br>'.$tmp_name.'<br>'.$extension.'<br>';
				if(move_uploaded_file($tmp_name, $location.$name))
					echo 'Uploaded';
				else echo 'Not uploaded';
			}
			else echo 'File size must be less than 2 MB.<br>';
		}
		else echo 'Please upload a jpeg/jpg image.<br>';
	}
}

?>

<form action="upload_file.php" method="POST" enctype="multipart/form-data">
	<input type="file" name="uploaded_file"><br><br>
	<input type="submit" value="Submit">
</form>