<?php
require 'point.php';
require 'helper.php';
?><!DOCTYPE html>
<html lang="en">
	<head>
		<meta charset="utf-8">
		<meta http-equiv="X-UA-Compatible" content="IE=edge">
		<meta name="viewport" content="width=device-width, initial-scale=1">
		<title>MetroMapper Questionnaire | Master Project by Michel Cijsouw | Eindhoven University of Technology</title>
		<link href="/css/bootstrap.min.css" rel="stylesheet">
		<link href="/css/style.css" rel="stylesheet">
	</head>
	<body>
		<nav class="navbar navbar-inverse navbar-fixed-top">
			<span class="navbar-brand">MetroMapper Questionnaire | Master Project by Michel Cijsouw | Eindhoven University of Technology</span>
		</nav>

		<div id="map-wrapper">
			<div id="loader"><div><i class="spinner"></i></div></div>
			<?php
			$helper = new Helper();
			
			$id = 0;
			if (isset($_GET['id'])) {
				$id = $helper->slugify($_GET['id']);
			}
			if(!is_dir(dirname(__FILE__) . '/maps/' . $id)) {
				throw new \Exception('Invalid map ID.');
			}

			$info = require dirname(__FILE__) . '/maps/' . $id . '/info.php';
			$schematization = $info['schematization'];
			$visualization = $info['visualization'];
			$arrowhints = $info['arrowhints'];
				
			$helper->renderQuestion($id);
			?>
			<div class="sidebar">
				<h4>Progress:</h4>
				<table class="table">
					<tbody>
						<tr><td>Question:</td><td>5 / 20</td></tr>
						<tr><td>Time taken:</td><td><span id="time">...</span><input id="time-input" type="hidden"></td></tr>
						<tr><td>Total time taken:</td><td><span id="total-time">...</span></td></tr>
					</tbody>
				</table>
				<h4>Map characteristics:</h4>
				<table class="table">
					<tbody>
						<tr><td>Schematization:</td><td><?php echo ucfirst($schematization); ?></td></tr>
						<tr><td>Visualization:</td><td><?php echo ucfirst($visualization); ?></td></tr>
						<tr><td>Arrow hints:</td><td><?php echo ($arrowhints ? 'Yes' : 'No'); ?></td></tr>
					</tbody>
				</table>
			</div>
		</div>
		
		<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.2/jquery.min.js"></script>
		<script src="/js/jquery.timer.js"></script>
		<script src="/js/jquery.alerts.js"></script>
		<script src="/js/scripts.js"></script>
	</body>
</html>