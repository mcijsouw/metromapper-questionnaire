<?php
session_start();
header("Content-type: text/html; charset=ISO-8859-1");
require_once 'flow.php';
flow(4);

require_once 'point.php';
require_once 'helper.php';
require_once 'config.php';

$config = new Config();

$helper = new Helper();
$helper->handleFinalPost();

?><!DOCTYPE html>
<html lang="en">
	<head>
		<meta charset="utf-8">
		<meta http-equiv="X-UA-Compatible" content="IE=edge">
		<meta name="viewport" content="width=device-width, initial-scale=1">
		<title><?php echo $config->title; ?></title>
		<link href="http://fonts.googleapis.com/css?family=Open+Sans:400,600,700" rel="stylesheet">
		<link href="/css/bootstrap.min.css" rel="stylesheet">
		<link href="/css/style.css" rel="stylesheet">
	</head>
	<body class="final">
		<nav class="navbar navbar-inverse navbar-fixed-top">
			<span class="navbar-brand"><?php echo $config->title; ?></span>
		</nav>

		<form action="final.php" method="post" enctype="multipart/form-data">
			<div class="explanation">
				<h2>Almost done!</h2>
				<p>Thank you for answering all <?php echo $config->amountOfQuestions; ?> questions! We would like to know a few more details about you.</p>
				<p><table class="table table-final">
					<tr><td><span class="input-label">Your age:</span></td><td><input type="text" name="age" class="form-control age"></td></tr>
					<tr><td><span class="input-label">Your level of education:</span></td><td>
							<select name="education" class="form-control">
								<option value=""></option>
								<option value="Primary education">Primary education</option>
								<option value="Secondary education">Secondary education</option>
								<option value="Bachelor">Bachelor</option>
								<option value="Master or higher">Master or higher</option>
							</select></td></tr>
					<tr><td>How familiar are you with schematic maps of public transportation networks?</td><td>
							<select name="familiar" class="form-control">
								<option value=""></option>
								<option value="1">(1) I have not seen schematic maps before.</option>
								<option value="2">(2) I have seen schematic maps, but I never used them to plan a route.</option>
								<option value="3">(3) I use schematic maps sometimes.</option>
								<option value="4">(4) I use schematic maps often.</option>
								<option value="5">(5) I work with schematic maps almost every day.</option>
							</select></td></tr>
				</table></p>
				<p>Additionally, you can leave comments in the textarea below. Please do not hesitate to leave a comment, all feedback is welcome and will be of great help for this experiment!</p>
				<p><textarea name="comments" class="form-control"></textarea></p>
				<input type="hidden" name="finalForm" value="1" />
				<input type="submit" value="Finish questionnaire" />
			</div>
		</form>
		
		<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.2/jquery.min.js"></script>
		<script src="/js/jquery.timer.js"></script>
		<script src="/js/jquery.alerts.js"></script>
		<script src="/js/scripts.js"></script>
	</body>
</html>