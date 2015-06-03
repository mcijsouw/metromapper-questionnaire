<?php
return array(
	'map' => 'Vienna-raw.graphml',
	'start' => new Point('start', 520, 688),
	'end' => new Point('end', 520, 164),
	'intersections' => array(
		new Point('Karlsplatz', 311, 478),
		new Point('Praterstern', -108, 374),
		new Point('Landstraße', 101, 478),
		new Point('Volkstheater', 363, 321),
		new Point('Spittelau', -3, 59),
		new Point('Schwedenplatz', 101, 374),
		new Point('Längenfeldgasse', 730, 374),
		new Point('Schottenring', 101, 269),
		new Point('Stephansplatz', 206, 374),
		new Point('Westbahnhof', 625, 269),
	),
	'answer' => array(
		'Karlsplatz',
		'Stephansplatz',
		'Volkstheater',
		'Westbahnhof',
	),
	'schematization' => 'raw',
	'visualization' => 'fixed',
	'arrowhints' => false,
	'averageEdgeTime' => 87,
);
