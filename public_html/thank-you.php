<?php
session_start();
header("Content-type: text/html; charset=ISO-8859-1");
require_once 'flow.php';
flow(5, true);

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
			<h2>Questionnaire finished!</h2>
			<p>Thank you for participating in our questionnaire.<br>Your answers are safely stored will be analyzed for research purposes.</p>
			<p>We ask you to <strong>not</strong> fill in the questionnaire as second time, since this may bias the experiment. We would appreciate it if you would spread the word by giving the address below to friends, family, and colleagues. <pre>http://metromapper.michelcijsouw.nl</pre></p>
			<p>Thank you again for taking part in this experiment!</p>
			<p>&nbsp;</p>
			<p><small>You may now close your browser window or tab. If you are still in full screen mode, you can press the same key again to exit full screen mode (F11 on Windows; Cmd+Shift+F or Ctrl+Cmd+F on Mac).</small></p>
		</div>
		
		<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.2/jquery.min.js"></script>
		<script src="/js/jquery.timer.js"></script>
		<script src="/js/jquery.alerts.js"></script>
		<script src="/js/scripts.js"></script>
	</body>
</html>