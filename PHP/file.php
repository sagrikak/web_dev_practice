<?php

$handle = fopen("Text_files/names.txt", 'w');
fwrite($handle, 'Sagrika Khandelwal'."\n");
fclose($handle);

$handle = fopen("Text_files/names.txt", 'a');
fwrite($handle, 'Alex Goot'."\n");
fclose($handle);

$count=0;
$readin = file("Text_files/names.txt");//reading a file
$readin_count = count($readin);
foreach ($readin as $fname) {
	echo trim($fname);
	$count++;
	if($count != $readin_count)
		echo ', ';
	else echo '.';
}
echo '<br><br>';

$file_name = "Text_files/names2.txt";
if(file_exists($file_name))
{
	$handle2 = fopen($file_name, 'w');
	fwrite($handle2, 'Sagrika Khandelwal'.", ");
	fclose($handle2);

	$handle2 = fopen($file_name, 'a');
	fwrite($handle2, 'Alex Goot'.", ");
	fclose($handle2);
	$handle2 = fopen($file_name, 'r'); 
	$datain = fread($handle2, filesize($file_name)); 

	$names_array = explode(',', $datain);//takes , as delimiter and separates the words
	foreach ($names_array as $name) {
		echo $name.'<br>';
	}

	$string = implode(' |', $names_array);//opposite of explode  
	echo $string.'<br>';
	fclose($handle2);
}
else echo 'File doesn\'t exist<br>';
echo '<br>';

rename('Text_files/names.txt', 'Text_files/names1.txt');

$directory = 'Text_files';
if($dir = opendir($directory.'/'))
	echo 'Looking inside<br>';
while($file = readdir($dir))
{
	echo '<a href="'.$directory.'/'.$file.'">'.$file.'</a><br>';
}
echo '<br>';

$del = 'Text_files/todelete.txt';
if(file_exists($del))
	unlink($del);//to delete a file
else echo 'File doesn\'t exist.<br>';

?>