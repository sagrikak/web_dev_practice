<?php
//ip based unique hit counter

function hit_count()
{
	$ip_addr = $_SERVER['REMOTE_ADDR'];
	$ipfile = file('Text_files/ip.txt');
	$found = false;
	foreach ($ipfile as $ip) {
		$ip_single = trim($ip);
		if($ip_addr == $ip_single)
		{
			$found=true;
			break;
		} 
	}
	if($found == false)
	{
		$filename = 'Text_files/count.txt';
		$handle = fopen($filename, 'r');
		$current = fread($handle, filesize($filename)); 
		fclose($handle);
		
		$current++;

		$handle = fopen($filename, 'w');
		fwrite($handle, $current);
		fclose($handle);

		$handle = fopen('Text_files/ip.txt', 'a');
		fwrite($handle, $ip_addr."\n");
		fclose($handle);
	}
}

hit_count();

?>
