<?php

class Helper {

	/** @var MysqliDb */
	private $db;

	/** @var Config */
	private $config;
	
	public function __construct()
	{
		require_once 'MysqliDb.php';
		require_once 'config.php';

		$this->config = new Config();
		$this->db = new MysqliDb($this->config->host, $this->config->user, $this->config->pass, $this->config->db, null, 'ISO-8859-1');
	}
	
	public function handleFinalPost()
	{
		if (!empty($_POST['finalForm'])) {
			$sessid = $this->slugify(session_id());
			$age = filter_input(INPUT_POST, 'age', FILTER_SANITIZE_STRING);
			$education = filter_input(INPUT_POST, 'education', FILTER_SANITIZE_STRING);
			$familiar = filter_input(INPUT_POST, 'familiar', FILTER_SANITIZE_STRING);
			$comments = filter_input(INPUT_POST, 'comments', FILTER_SANITIZE_STRING);

			# Write to database
			$data = array(
				'sessid' => $sessid,
				'age' => $age,
				'education' => $education,
				'familiar' => $familiar,
				'comments' => $comments,				
			);
			$insert = $this->db->insert('final', $data);
			if ($insert == false) {
				die('Something went wrong when saving the data to the database...');
			}
			
			# Finished questionnaire
			$_SESSION['step']++;
			header('Location: thank-you.php');
			die;
			
		}
	}

	/**
	 * Handle post
	 */
	public function handlePost()
	{
		if (!empty($_POST['id'])) {
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
			$_SESSION['currentQuestion']++;
			
			# Finished questionnaire
			if($_SESSION['currentQuestion'] > $this->config->amountOfQuestions) {
				$_SESSION['currentQuestion'] = 1;
				$_SESSION['questionnaireFinished'] = true;
				$_SESSION['step']++;
				header('Location: final.php');
				die;
			}
			
		}
	}

	/**
	 * Serve IDs at random, but give priority to IDs that were least chosen before.
	 */
	public function getIdSmart()
	{
		if(isset($_GET['__id'])) {
			return $this->slugify($_GET['__id']);
		}
		
		$amount = $this->config->amountOfQuestions;

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

	public function getTypeString(array $info) 
	{
		$visualization = $info['visualization'];
		$arrowhints = $info['arrowhints'];
		
		$type = "Unknown...";
		if($visualization == 'source based') {
			if($arrowhints == true) {
				$type = '<strong>Source based</strong> visualization with <strong>arrow hints</strong>.';
			} else {
				$type = '<strong>Source based</strong> visualization with <strong>dotted lines</strong>.';
			}
		} elseif($visualization == 'all-pairs based') {
			$type = '<strong>All-pairs based</strong> visualization.';
		} elseif($visualization == 'fixed source based') {
			if($arrowhints == true) {
				$type = '<strong>Arrow hints</strong> only.';
			} else {
				$type = '<strong>Dotted lines</strong> only.';
			}
		} elseif($visualization == 'fixed') {
			$type = 'No extra features.';
		}
		
		return $type;
	}
	
	public function getAverageTimeString(array $info) 
	{
		$avgTime = 0;
		if(array_key_exists('averageEdgeTime', $info)) {
			$avgTime = $info['averageEdgeTime'];
		}
		
		$min = floor($avgTime / 60);
		$sec = $avgTime % 60;
		
		return $min . ' minute' . ($min > 1 ? 's' : '') . ' and ' . $sec . ' seconds';
	}
	
	public function renderQuestion($id)
	{
		$info = require dirname(__FILE__) . '/maps/' . $id . '/info.php';
		$mapPath = dirname(__FILE__) . '/maps/' . $id . '/map.png';
		
		$type = $this->getTypeString($info);
		$avgTime = $this->getAverageTimeString($info);
		
		echo '<div id="pre-info">
				<div class="full">
					<div class="panel">
						<h4>Next question</h4>
						<p>Map type:<br>' . $type . '</p>
						<p><small>Average line segment length:<br>' . $avgTime . '</small></p>
						<p><input type="button" id="next" value="Start next question"></p>
					</div>
				</div>
			</div>';
		
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
