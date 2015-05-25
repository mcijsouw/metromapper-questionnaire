<?php

class Helper {

	/** @var MysqliDb */
	private $db;

	public function __construct()
	{
		require_once 'MysqliDb.php';
		require_once 'config.php';

		$config = new Config();
		$this->db = new MysqliDb($config->host, $config->user, $config->pass, $config->db, null, 'ISO-8859-1');
	}

	/**
	 * Handle post
	 */
	public function handlePost()
	{
		if (!empty($_POST)) {
			$sessid = $this->slugify(session_id());
			$id = $this->slugify(filter_input(INPUT_POST, 'id', FILTER_SANITIZE_STRING));
			$time = filter_input(INPUT_POST, 'time', FILTER_SANITIZE_NUMBER_FLOAT, FILTER_FLAG_ALLOW_FRACTION);
			$clicks = filter_input(INPUT_POST, 'clicks', FILTER_SANITIZE_STRING);

			$info = require dirname(__FILE__) . '/maps/' . $id . '/info.php';
			$schematization = $info['schematization'];
			$visualization = $info['visualization'];
			$arrowhints = $info['arrowhints'];
			$answer = $info['answer'];


			$intersections = array();
			$intersectionsJson = '[';
			$first = true;
			if (!empty($_POST['intersections'])) {
				foreach ($_POST['intersections'] as $int) {
					$name = htmlspecialchars($int, ENT_SUBSTITUTE, 'ISO-8859-1');
					$intersections[] = $name;
					if($first) {
						$first = false;
					} else {
						$intersectionsJson .= ',';
					}
					$intersectionsJson .= '"' . $name . '"';
				}
			}
			$intersectionsJson .= ']';
			

			# Correct check
			$correct = (count($answer) == count($intersections));
			foreach ($intersections as $int) {
				if (in_array($int, $answer) == false) {
					$correct = false;
				}
			}

			# Write to database
			$data = array(
				'mapid' => $id,
				'time' => $time,
				'selected_stations' => $intersectionsJson,
				'is_correct' => ($correct ? 1 : 0),
				'events' => $clicks,
				'sessid' => $sessid,
				'schematization' => $schematization,
				'visualization' => $visualization,
				'arrowhints' => ($arrowhints ? 1 : 0),
			);
			$insert = $this->db->insert('answers', $data);
			if ($insert == false) {
				die('Something went wrong when saving the data to the database...');
			}

			if (empty($_SESSION['totalTime'])) {
				$_SESSION['totalTime'] = 0;
			}
			$_SESSION['totalTime'] += $time;

			if (empty($_SESSION['currentQuestion'])) {
				$_SESSION['currentQuestion'] = 1;
			}
			$_SESSION['currentQuestion'] ++;
		}
	}

	/**
	 * Serve IDs at random, but give priority to IDs that were least chosen before.
	 */
	public function getIdSmart()
	{

		$amount = 20;

		if (empty($_SESSION['questions'])) {
			$_SESSION['questions'] = array();
			$query = "SELECT * FROM questions ORDER BY `count` ASC, RAND() LIMIT 0, " . $amount;
			$list = $this->db->query($query);
			$i = 1;
			foreach ($list as $obj) {
				$_SESSION['questions'][$i] = $obj['mapid'];
				$i++;
			}
		}

		if (empty($_SESSION['currentQuestion'])) {
			$_SESSION['currentQuestion'] = 1;
		}
		$currentQuestion = $_SESSION['currentQuestion'];

		if (false == array_key_exists($currentQuestion, $_SESSION['questions'])) {
			die('Out of questions... (delete session cookies and try again)');
		}
		
		$id = $this->slugify($_SESSION['questions'][$currentQuestion]);
		if (!is_dir(dirname(__FILE__) . '/maps/' . $id)) {
			die('Invalid map ID: ' . $id . '.');
		}

		return $id;
	}

	public function renderQuestion($id)
	{
		$info = require dirname(__FILE__) . '/maps/' . $id . '/info.php';
		$mapPath = dirname(__FILE__) . '/maps/' . $id . '/map.png';
		list($width, $height) = getimagesize($mapPath);
		echo '<img src="/maps/' . $id . '/map.png" class="map" data-orgwidth="' . $width . '" data-orgheight="' . $height . '">';

		$start = $info['start'];
		$start->renderStart();

		$end = $info['end'];
		$end->renderEnd();

		foreach ($info['intersections'] as $point) {
			$point->renderIntersection();
		}

		foreach ($info['intersections'] as $point) {
			$point->renderCheckbox();
		}
		echo '<input type="hidden" name="clicks" id="clicks-input">';
	}

	public function renderQuestionList()
	{
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
