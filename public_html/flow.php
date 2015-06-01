<?php

function flow($step, $last = false) {
	
	if(empty($_SESSION['step'])) {
		$_SESSION['step'] = 1;
	}
	
	if(!empty($_POST['advanceStep'])) {
		$_SESSION['step']++;
		header('Location: ' . $_SERVER['REQUEST_URI']);
		die;
	}
	
	if(!$last && $step != $_SESSION['step']) {
		switch($_SESSION['step']) {
			case 1:
				$url = 'intro.php';
				break;
			case 2:
				$url = 'task.php';
				break;
			case 3:
				$url = 'questionnaire.php';
				break;
			case 4:
				$url = 'final.php';
				break;
			default:
				$url = 'thank-you.php';
				break;
		}
		echo 'You are not allowed to use your browser\'s back button. Click <a href="' . $url . '">here</a> to continue.';
		die;
	} else {
		$_SESSION['step'] = $step;
	}
	
	if($last) {
		$_SESSION['step'] = 1;
	}

}