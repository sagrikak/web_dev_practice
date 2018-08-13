<?php

include_once 'example_header.php';//if the file is missing, rund the script with warning//_once checks that the file has been included only once//prevents repetition
require_once 'initialize.php';//doesn't run script if the file is missing

echo $_SERVER['SCRIPT_NAME'].'<br>';
echo $_SERVER['HTTP_HOST'].'<br>';
echo $_SERVER['REMOTE_ADDR'].'<br>';//ip address of visitor//unreliable
$http_client_ip = $_SERVER['http_client_ip'];//actual internet ip address rather than the individual computer
$http_x_forwarded_for = $_SERVER['http_x_forwarded_for'];//checking for proxy
$remote_addr = $_SERVER['REMOTE_ADDR'];
//more reliable way of getting visiter's ip 
if(!empty($http_client_ip)){
	$visitor_ip = $http_client_ip;
} else if(!empty($http_x_forwarded_for)) {
	$visitor_ip = $http_x_forwarded_for;
} else {
	$visitor_ip = $remote_addr;
}
/*
$ip_blocked = array('127.0.0.1', '100.100.2.1');
foreach ($ip_blocked as $ip) {
	if($visitor_ip == $ip)
		die('You are Blocked.');
}*/

echo '<input type="text" name="name"><br>';//embedding html in php using echo language contruct
echo $text.' '.$text2.'<br>';
echo "$text $text2<br>";
$text .= ' ';
$text .= $text2;
echo $text.'<br>';
echo str_word_count($text).'<br>';
echo str_word_count($text, 1).'<br>';//forms an array of the string
print_r(str_word_count($text, 1));
echo '<br>';
echo str_word_count($text, 2).'<br>';//forms associative array of the string
print_r(str_word_count($text, 2, '.'));
echo '<br>';
echo str_word_count($text, 2, '.').'<br>';//counts '.' as a word if used with a space
echo str_shuffle($text).'<br>';
echo substr(str_shuffle($text), 0, (strlen($text)+1)/2).'<br>';//creates a substring from the given string using end points 
echo strrev($text).'<br>';
echo similar_text($text, $text2).'<br>';//returns the number of characters similar in both strings
similar_text($text, $text2, $result);//returns the % similarity of both strings
echo $result.'<br>';
echo trim(" Hi Everyone ").'<br>';//trims the side spaces in a string//ltrim and rtrim can also be used for specific sides
echo addslashes("He'll come").'<br>';//adds slashes before characters that are needed to escape
echo stripslashes("He\'ll come").'<br>';
echo strtolower($text).'<br>';
echo strtoupper($text).'<br>';
echo substr_replace($text, 'lr', 8, 2).'<br>';//replace the substring at position 8 consisting of 2 letters with 'lr'
$find = array('e', 'o');
$replace = array('i', 'e');
echo str_replace($find, $replace, $text).'<br>';
echo strpos($text, 'ell').'<br>';//finds the position of a string in another string
$offset = 0;
while($string_position = strpos($text, ' ', $offset))//for finding multiple occurences of a string
{
	echo $string_position.'<br>';
	$offset = $string_position + 1;
}

if(preg_match('/Hell/', $text))//checks if the pattern exists in string
	echo 'Match found<br>';
else echo 'No match found<br>';

//die('Error! Page has ended.');//to stop the remaining script from executing in case of fatal error

$num1 = 1;
$num2 = 1;
if($num1 == $num2)
		echo 'Equal<br>';
else echo 'Not Equal<br>';
if($num1 === $num2)
	echo 'Truly Equal<br>';

$user_ip = $_SERVER['REMOTE_ADDR'];//returns user's ip address

function echo_ip()
{
	global $user_ip;
	$string = 'Your IP address is '.$user_ip.'<br>';
	echo $string;
}
echo_ip();

$arr = array(3, 4, 7, 9);
print_r($arr);
echo '<br>';

$dictionary = array('one'=>1, 'two'=>2, 'three'=>3);
print_r($dictionary);
echo '<br>';
echo $dictionary[two].'<br>';

$food = array('Healthy'=>array('Salad', 'Vegetables', 'Pasta'), 'Unhealthy'=>array('Pizza', 'Ice Cream'));//multi-dimensional array
echo $food['Healthy'][1].'<br>';

foreach ($food as $element => $inner_array) {
	echo '<strong>'.$element.'</strong><br>';
	foreach ($inner_array as $item) {
		echo $item.'<br>';
	}
}

$time_now = time();
echo date('d M Y H:i:s', $time+strtotime('- 1 week - 1 hour')).'<br>';
echo date('d M Y H:i:s', $time+strtotime('+ 1 week 1 hour')).'<br>';
echo rand().'/'.getrandmax().'<br>';
echo rand(100, 120).'<br>';
echo md5($text).'<br>';//calculates md5 hash of a string//32 characters
 
?>

<input type="text" value="<?php echo $text; ?>"><!--embedding php in html-->