<?php
require 'point.php';
require 'helper.php';
?><!DOCTYPE html>
<html lang="en">
	<head>
		<meta charset="utf-8">
		<meta http-equiv="X-UA-Compatible" content="IE=edge">
		<meta name="viewport" content="width=device-width, initial-scale=1">
		<title>MetroMapper Questionnaire | Master Project by Michel Cijsouw | TU/e</title>
		<link href="/css/bootstrap.min.css" rel="stylesheet">
		<link href="/css/style.css" rel="stylesheet">
	</head>
	<body>
		<h1>MetroMapper Questionnaire</h1>
		
		<?php
		$helper = new Helper();
		if(isset($_GET['id'])) {
			$id = $helper->slugify($_GET['id']);
			$helper->renderQuestion($id);
		}
		// @todo remove
		echo '<h2>Question list:</h2>';
		$helper->renderQuestionList();
		?>

		<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.2/jquery.min.js"></script>
		<script src="/js/scripts.js"></script>
	</body>
</html>