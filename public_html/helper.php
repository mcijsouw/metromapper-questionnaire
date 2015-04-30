<?php

class Helper {

	public function renderQuestion($id) {
		$info = require dirname(__FILE__) . '/maps/' . $id . '/info.php';
		echo '<div id="map-wrapper">';
		echo '<img src="/maps/' . $id . '/map.png" class="map">';
		
		$start = $info['start'];
		$start->renderStart();
		
		$end = $info['end'];
		$end->renderEnd();
		
		foreach($info['intersections'] as $point) {
			$point->renderIntersection();
		}
		
		foreach($info['intersections'] as $point) {
			$point->renderCheckbox();
		}
		
		echo '</div>';
	}
	
	public function renderQuestionList() {
		echo '<table class="table table-striped">';
		if ($handle = opendir(dirname(__FILE__) . '/maps')) {
			while (false !== ($entry = readdir($handle))) {
				if ($entry != "." && $entry != "..") {
					echo '<tr><td><a href="?id=' . $entry . '">' . $entry . '</a></td></tr>';
				}
			}
			closedir($handle);
		}
		echo '</table>';
	}
	
	public function slugify($text)
	{
		# Replace non letter or digits by -
		$text = preg_replace('~[^\\pL\d]+~u', '-', $text);
		# Trim
		$text = trim($text, '-');
		# Transliterate
		if (function_exists('iconv')) {
			$text = iconv('utf-8', 'us-ascii//TRANSLIT', $text);
		}
		# Lowercase
		$text = strtolower($text);
		# Remove unwanted characters
		$text = preg_replace('~[^-\w]+~', '', $text);
		
		if (empty($text)) {
			return 'n-a';
		}
		return $text;
	}
	
}