<?php
session_start();
header("Content-type: text/html; charset=ISO-8859-1");
require_once 'flow.php';
flow(3);

require_once 'point.php';
require_once 'helper.php';
require_once 'config.php';

$config = new Config();

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
		<title><?php echo $config->title; ?></title>
		<link href="http://fonts.googleapis.com/css?family=Open+Sans:400,600,700" rel="stylesheet">
		<link href="/css/bootstrap.min.css" rel="stylesheet">
		<link href="/css/style.css" rel="stylesheet">
		<?php
		echo '
			<script>
				isQuestionnairePage = true;
				totalTimeOffset = ' . $totalTime . ' * 1000;
			</script>';
		?>
	</head>
	<body class="questionnaire">
		<nav class="navbar navbar-inverse navbar-fixed-top">
			<span class="navbar-brand"><?php echo $config->title; ?></span>
		</nav>

		<div id="map-wrapper">
			<form method="post" action="" id="question-form" enctype="multipart/form-data">
				<div id="loader"><div class="full"><i class="spinner"></i></div></div>
				<?php
				$helper->renderQuestion($id);
				
				?>
				<div class="sidebar">
					<h4>Progress:</h4>
					<div class="table-wrapper">
						<div class="prg" style="width: <?php echo (int) $_SESSION['currentQuestion'] * 100 / $config->amountOfQuestions; ?>%"></div>
						<table class="table">
							<tbody>
								<tr><td>Question:</td><td><?php echo (int) $_SESSION['currentQuestion'] . ' / ' . $config->amountOfQuestions; ?></td></tr>
								<tr><td>Time taken:</td><td><span id="time">0</span>+ seconds<input id="time-input" name="time" type="hidden"></td></tr>
							</tbody>
						</table>
					</div>
					<h4>Map type:</h4>
					<p class="string"><?php echo $helper->getTypeString($info); ?></p>
					<h4>Average line segment length:</h4>
					<p class="string"><?php echo $helper->getAverageTimeString($info); ?></p>
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