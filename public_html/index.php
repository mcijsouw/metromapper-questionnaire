<?php
session_start();
header("Content-type: text/html; charset=ISO-8859-1");

require 'point.php';
require 'helper.php';

$title = 'MetroMapper Questionnaire | Master Project by Michel Cijsouw | Eindhoven University of Technology';

$helper = new Helper();
$helper->handlePost();

$id = $helper->getIdSmart();

$info = require dirname(__FILE__) . '/maps/' . $id . '/info.php';
$schematization = $info['schematization'];
$visualization = $info['visualization'];
$arrowhints = $info['arrowhints'];

if(empty($_SESSION['totalTime'])) {
	$_SESSION['totalTime'] = 0;
}
$totalTime = $_SESSION['totalTime'];

?><!DOCTYPE html>
<html lang="en">
	<head>
		<meta charset="utf-8">
		<meta http-equiv="X-UA-Compatible" content="IE=edge">
		<meta name="viewport" content="width=device-width, initial-scale=1">
		<title><?php echo $title; ?></title>
		<link href="/css/bootstrap.min.css" rel="stylesheet">
		<link href="/css/style.css" rel="stylesheet">
		<?php
		echo '
			<script>
				totalTimeOffset = ' . $totalTime . ' * 1000;
			</script>';
		?>
	</head>
	<body>
		<nav class="navbar navbar-inverse navbar-fixed-top">
			<span class="navbar-brand"><?php echo $title; ?></span>
		</nav>

		<div id="map-wrapper">
			<form method="post" action="" id="question-form" enctype="multipart/form-data">
				<div id="loader"><div><i class="spinner"></i></div></div>
				<?php
				$helper->renderQuestion($id);
				?>
				<div class="sidebar">
					<h4>Progress:</h4>
					<table class="table">
						<tbody>
							<tr><td>Question:</td><td><?php echo (int) $_SESSION['currentQuestion']; ?> / 20</td></tr>
							<tr><td>Time taken:</td><td><span id="time">...</span><input id="time-input" name="time" type="hidden"></td></tr>
							<tr><td>Total time taken:</td><td><span id="total-time">...</span></td></tr>
						</tbody>
					</table>
					<h4>Map characteristics:</h4>
					<table class="table">
						<tbody>
							<tr><td>ID:</td><td><?php echo $id; ?></td></tr>
							<tr><td>Schematization:</td><td><?php echo ucfirst($schematization); ?></td></tr>
							<tr><td>Visualization:</td><td><?php echo ucfirst($visualization); ?></td></tr>
							<tr><td>Arrow hints:</td><td><?php echo ($arrowhints ? 'Yes' : 'No'); ?></td></tr>
						</tbody>
					</table>
				</div>
				<input type="hidden" name="id" value="<?php echo $id; ?>">
			</form>
		</div>
		
		<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.2/jquery.min.js"></script>
		<script src="/js/jquery.timer.js"></script>
		<script src="/js/jquery.alerts.js"></script>
		<script src="/js/scripts.js"></script>
	</body>
</html>