<?php

require_once 'MysqliDb.php';
require_once 'config.php';

$config = new Config();
$db = new MysqliDb($config->host, $config->user, $config->pass, $config->db, null, 'ISO-8859-1');

$path = dirname(__FILE__) . '/maps';

$existingMaps = array();
$list = $db->get('questions');
foreach($list as $obj) {
	if(!is_dir($path . '/' . $obj['mapid'])) {
		$db->where('mapid', $obj['mapid']);
		$db->delete('questions');
	} else {
		$existingMaps[] = $obj['mapid'];
	}
}
 
if ($handle = opendir($path)) {
	while (false !== ($entry = readdir($handle))) {
		if ($entry != "." && $entry != "..") {
			if(is_dir($path . '/' . $entry) && !in_array($entry, $existingMaps)) {
				$db->insert('questions', array(
					'mapid' => $entry,
					'count' => 0,
				));
			}
		}
	}
	closedir($handle);
}