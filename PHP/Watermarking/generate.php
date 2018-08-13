<?php

header('Content-type: image/jpeg');

if(isset($_GET['source']))
{
	$source = $_GET['source'];//loading the base image

	$watermark = imagecreatefrompng('Logo_TV_2015.png'); //loading the logo
	$watermark_height = imagesy($watermark);//getting logo height
	$watermark_width = imagesx($watermark);//getting logo width

	$image = imagecreatetruecolor($watermark_width, $watermark_height);
	$image = imagecreatefromjpeg($source);//getting base image size

	$image_size = getimagesize($source);//can't use imagesx and imagesy because the base image has not been loaded directly
	$x = $image_size[0] - $watermark_width - 10;//$image_size[0] corresponds to width and $image_size[1] corresponds to height
	$y = $image_size[1] - $watermark_height - 10;//creating a gap of 10 pixels from border of base image

	imagecopymerge($image, $watermark, $x, $y, 0, 0, $watermark_width, $watermark_height, 20);
	imagejpeg($image, 'watermarked.jpeg');//save watermarked image as watermarked.jpeg
}

?>