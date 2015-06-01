<?php
session_start();
header("Content-type: text/html; charset=ISO-8859-1");
require_once 'flow.php';
flow(1);

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
			<h2>Embedding Travel Time Cues in Schematic Maps</h2>
			<p>Welcome, and thank you for coming to our online questionnaire. Please read the instructions below carefully. When you are finished, you can press the <strong>Continue</strong> button on the bottom. It takes approximately 20-25 minutes to complete this questionnaire.</p>
			<h3>Metro maps</h3>
			<p>Urban transportation networks are often complex in densely populated cities. Travelers may use so-called <em>metro maps</em> in order to find their way through these networks. A metro map is a type of diagram in which shapes of lines are simplified and geographic distances are often heavily distorted in order to provide a clear overview of the network.</p>
			<p><img src="/img/explanation/metro-map.jpg"><small>Original map of Vienna (left) vs. metro map of Vienna (right).</small></p>
			<p>Because of these distortions, information about the original (real-world, geographically correct) map is lost. As a result, travelers could take unnecessary long routes when traveling from A to B. In order to tackle this problem we add one of the following <strong>features</strong> to the map that aid the user in finding the fastest route from A to B:</p>
			<h4>Feature 1: Source based visualization</h4>
			<p class="align-left"><img class="left" src="/img/explanation/count1.jpg">Let's pick an arbitrary starting station <strong>A</strong>, and an arbitrary destination station <strong>B</strong>. Now, we start at station <strong>A</strong> and we go to <strong>B</strong> via the fastest (pre-computed) route. Every time we move from one station to another, we increase the <strong>line count</strong> of the line segment we just passed.</p>
			<p class="align-left"><img class="left" src="/img/explanation/count2.jpg">Now consider a different destination station <strong>C</strong>. Moving from <strong>A</strong> to <strong>C</strong>, we encounter three line segments that already have a line count of 1, so we increase these line counts to 2 when we traverse them.</p>
			<p class="align-left"><img class="left" src="/img/explanation/count3.jpg">We repeat this process for all stations on the map, i.e., we choose a different destination station until we covered the whole map. This results in a map in which every line segment is annotated with a number.</p>
			<p class="align-left"><img class="left" src="/img/explanation/count4.jpg">Now, we let these numbers determine the thickness of the corresponding line segment. This results in a map in which "important" lines (lines that are used most often) are displayed thicker than "unimportant" lines (lines that are rarely used). We call this a <strong>source based visualization</strong> in which <strong>A</strong> is the starting station.</p>
			<p class="align-left"><img class="left" src="/img/explanation/count5.jpg">Note that the metro map looks completely different if we pick another starting station anywhere else on the map. The example on the left shows the same situation as above, but now with <strong>C</strong> as starting station.</p>
			<h4>Feature 2: All-pairs based visualization</h4>
			<p>This approach is very similar to source based visualization, but instead of picking a fixed starting station, we now compute the <strong>line counts for all stations combined</strong>. This also results in a map in which important lines are displayed thicker than unimportant lines, but the line thicknesses are no longer relative to a given starting station.<br>&nbsp;</p>
			<p class="align-left"><img class="left" src="/img/explanation/allpairs1.jpg">See the example on the left, and imagine that we want to travel from <strong>A to B</strong>. We would have to choose between two possible routes: <strong>A &#10142; C &#10142; B</strong> or <strong>A &#10142; D &#10142; B</strong>. We do not know in which way this schematic map is distorted, so the question arises: which of these routes is the fastest?</p>
			<p class="align-left"><img class="left" src="/img/explanation/allpairs2.jpg">The example on the left shows the same situation, enhanced with an <strong>all-pairs based visualization</strong>. Recall that a thick line means that a line segment is often used, and a thin line means a line segment is rarely used. In this case we can infer that <strong>A &#10142; C &#10142; B</strong> is most likely the fastest route, since the line segments between <strong>D</strong> and <strong>B</strong> are thin, and thus rarely used in any fastest route in the network.</p>
			<h4>Feature 3: Dotted lines</h4>
			<p class="align-left dotted-lines">
				<img class="left" src="/img/explanation/dotted-lines.jpg">When a line segment's <strong>line count is equal to zero</strong>, it means that this line segment is never part of <strong>any</strong> shortest route. We replace these line segments with dotted lines. If we want to find the fastest route from starting station <strong>A</strong> to any arbitrary destination station, we know that we must avoid traveling over the dotted lines.
				<img class="avoid-dotted-lines" src="/img/explanation/avoid-dotted-lines.png">
			</p>
			<h4>Feature 4: Arrow hints</h4>
			<p class="align-left">
				<img class="left" src="/img/explanation/arrow-hints.jpg">When a starting station <strong>A</strong> is given, we can hint the user in the right direction by annotating line segments with arrows. If we want to find the fastest route from starting station <strong>A</strong> to any arbitrary destination station, we know that we must <strong>only travel over line segments on which the arrow is pointing in the direction we are traveling</strong>. Line segments that are not annotated with an arrow should be avoided altogether. Note that this only applies to maps in which arrow hints are used.
				<img src="/img/explanation/arrow-hints-avoid-follow.jpg">
			</p>
			<p>&nbsp;</p>
			<p><hr></p>
			<p>&nbsp;</p>
			<p>Remark: we realize that switching from one train to another takes time. This extra time is taken into account when computing the fastest route from one station to another. We incur a <strong>penalty of 5 minutes</strong> for transfers from one train to another. As a result, taking a (small) detour may sometimes be faster than taking a shorter route with more transfers.</p>
			
			<form action="task.php" method="post" enctype="multipart/form-data">
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