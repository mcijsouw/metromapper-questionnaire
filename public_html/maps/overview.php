<?php

require '../point.php';
//require 'helper.php';

$path = dirname(__FILE__);

$infos = array();

if ($handle = opendir($path)) {
	while (false !== ($entry = readdir($handle))) {
		if ($entry != "." && $entry != "..") {
			if(is_dir($path . '/' . $entry)) {
				$info = require $path . '/' . $entry . '/info.php';
				$key = ucfirst($info['schematization']) . '<br>' . ucfirst($info['visualization']) . '<br>' . ($info['arrowhints'] ? 'With arrow hints' : 'Without arrow hints');
				if(false == array_key_exists($key, $infos)) {
					$infos[$key] = array();
				}
				$infos[$key][] = $info['map'];
			}
		}
	}
	closedir($handle);
}

echo '<table border="1" cellpadding="10" cellspacing="0">';
foreach($infos as $key => $value) {
	$maps = '';
	$counts = '';
	$total = 0;
	foreach(array_count_values($value) as $map => $count) {
		$maps .= $map . '<br>';
		$counts .= $count . '<br>';
		$total += $count;
	}
	$maps .= '<strong>Total</strong>';
	$counts .= '<strong>' . $total . '</strong>';
	echo '<tr><td valign="top">' . $key . '</td><td>' . $maps . '</td><td>' . $counts . '</td></tr>';
}
echo '</table>';