<?php

header('Content-type: image/jpeg');

if(isset($_GET['email']) && !empty($_GET['email']))
	$email = $_GET['email'];
else $email = 'No email specified';
$email_len = strlen($email);

$font_size = 4;

$image_height = ImageFontHeight($font_size);
$image_width = ImageFontWidth($font_size) * $email_len;

$image = imagecreate($image_width, $image_height); 

imagecolorallocate($image, 255, 255, 255);
$font_color = imagecolorallocate($image, 0, 0, 0);

imagestring($image, $font_size, 0, 0, $email, $font_color);
imagejpeg($image);

?>
