<?php
return array(
	'map' => 'Vienna-raw.graphml',
	'start' => new Point('start', 166, 118),
	'end' => new Point('end', 166, 490),
	'intersections' => array(
		new Point('Karlsplatz', 909, 614),
		new Point('Praterstern', 413, 490),
		new Point('Landstraße', 661, 614),
		new Point('Volkstheater', 971, 428),
		new Point('Spittelau', 537, 118),
		new Point('Schwedenplatz', 661, 490),
		new Point('Längenfeldgasse', 1404, 490),
		new Point('Schottenring', 661, 366),
		new Point('Stephansplatz', 785, 490),
		new Point('Westbahnhof', 1280, 366),
	),
	'answer' => array(
		'Spittelau',
		'Schottenring',
		'Schwedenplatz',
		'Praterstern',
	),
	'schematization' => 'raw',
	'visualization' => 'fixed source based',
	'arrowhints' => false,
	'averageEdgeTime' => 87,
);
