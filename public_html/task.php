<?php
session_start();
header("Content-type: text/html; charset=ISO-8859-1");
require_once 'flow.php';
flow(2);

require_once 'config.php';
$config = new Config();

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
	<body>
		<nav class="navbar navbar-inverse navbar-fixed-top">
			<span class="navbar-brand"><?php echo $config->title; ?></span>
		</nav>
		
		<div class="explanation">
			<h3>Task</h3>
			<p>In this questionnaire we will present a number of different metro maps with different features (i.e., source based visualization, all-pairs based visualization, dotted lines, arrow hints). Before each question we will let you know which of these features will occur. Furthermore, we will give the average length (in seconds) of all line segments so that you get an idea of the scale of the map.</p>
			<p>We will ask you to <strong>determine the fastest route</strong> from a given starting station to a given destination station. On this route you must click on all the <strong>intersections</strong> that you travel through, and finally you must click on the <strong>destination station</strong> to submit your answer.</p>
			<p>Intersections, starting stations and destination stations are marked as follows:</p>
			<p><img src="/img/explanation/intersection.png" class="marked"><img src="/img/explanation/start.png" class="marked"><img src="/img/explanation/end.png" class="marked"></p>
			<h3>Browser/device compatibility</h3>
			<p>The functionality of this application was tested in the browsers Mozilla Firefox, Google Chrome and Microsoft Internet Explorer 11. We advise you to use a laptop or desktop PC in combination with one of these three browsers when filling out this questionnaire. Please do not use a smartphone, tablet or other touchscreen device, since different types of pointing devices may bias the experiment.</p>
			<p>It is important that the metro maps in this questionnaire are completely visible on the screen. Please put your browser in full screen mode by pressing <strong>F11</strong> for Windows users, or <strong>Cmd+Shift+F</strong> or <strong>Ctrl+Cmd+F</strong> for Mac users. Make sure that the figure below fits entirely onto your screen. If your screen is still too small we will resize our maps automatically such that they fit precisely in the available space.
			<p><img src="/img/explanation/placeholder.jpg" class="placeholder"></p>
			<h3>Compatibility test</h3>
			<p>In order to make sure that you will not experience any problems filling in the questionnaire, we ask you to select all intersections on the map below. When this task is done, the <strong>Continue</strong> button below will lead you to the questionnaire.</p>
			<div id="compatibility-test">
				<img src="/img/explanation/compatibility-test.png" class="map" data-orgwidth="572" data-orgheight="161">
				<div data-id="1" class="point intersection" data-x="100" data-y="103"><div class="inner"></div></div>
				<div data-id="2" class="point intersection" data-x="239" data-y="103"><div class="inner"></div></div>
				<div data-id="3" class="point intersection" data-x="338" data-y="53"><div class="inner"></div></div>
				<div data-id="4" class="point intersection" data-x="488" data-y="53"><div class="inner"></div></div>
				<input type="checkbox" class="hidden" name="intersections[]" value="1">
				<input type="checkbox" class="hidden" name="intersections[]" value="2">
				<input type="checkbox" class="hidden" name="intersections[]" value="3">
				<input type="checkbox" class="hidden" name="intersections[]" value="4">
			</div>
		
			<form action="questionnaire.php" method="post" enctype="multipart/form-data" id="complete-compatibility-test-first">
				<input type="hidden" name="advanceStep" value="1" />
				<input type="submit" value="Continue" />
			</form>
		</div>
		
		<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.2/jquery.min.js"></script>
		<script src="/js/jquery.timer.js"></script>
		<script src="/js/jquery.alerts.js"></script>
		<script src="/js/scripts.js"></script>
	</body>
</html>