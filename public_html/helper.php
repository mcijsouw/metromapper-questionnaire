<?php

class Helper {

	public function renderQuestion($id) {
		$info = require dirname(__FILE__) . '/maps/' . $id . '/info.php';
		$mapPath = dirname(__FILE__) . '/maps/' . $id . '/map.png';
		list($width, $height) = getimagesize($mapPath);
		echo '<img src="/maps/' . $id . '/map.png" class="map" data-orgwidth="' . $width . '" data-orgheight="' . $height . '">';
		
		$start = $info['start'];
		$start->renderStart();
		
		$end = $info['end'];
		$end->renderEnd();
		
		foreach($info['intersections'] as $point) {
			$point->renderIntersection();
		}
		
		echo '<form method="post" action="" id="question-form">';
		foreach($info['intersections'] as $point) {
			$point->renderCheckbox();
		}
		echo '<input type="hidden" name="clicks" id="clicks-input">';
		echo '</form>';
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