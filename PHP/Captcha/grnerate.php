<?php

session_start();
header('Content-type: image/jpeg');

$text = $_SESSION['secure'];
$font_size = 30;

$image_width = 150;
$image_height = 40;

$image = imagecreate($image_width, $image_height);
imagecolorallocate($image, 255, 255, 255);
$text_color = imagecolorallocate($image, 0, 0, 0);

for ($i=1; $i<50; $i++) { 
	$x1 = rand($i, $image_width);
	$y1 = rand($i, $image_height);
	$x2 = rand($i, $image_width);
	$y2 = rand($i, $image_height);
	imageline($image, $x1, $y1, $x2, $y2, $text_color);
}

imagettftext($image, $font_size, 0, 15, 30, $text_color, '/home/sagrika/Documents/WEB/PHP/Captcha/waltographUI.ttf', $text);
imagejpeg($image);

?>