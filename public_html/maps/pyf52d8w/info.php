<?php
return array(
	'map' => 'Vienna',
	'start' => new Point('start', 649, 259),
	'end' => new Point('end', 517, 710),
	'intersections' => array(
		new Point('Spittelau', -37, -83),
		new Point('Stephansplatz', 234, 379),
		new Point('Schottenring', 110, 247),
		new Point('Schwedenplatz', 126, 383),
		new Point('Landstraße', 138, 530),
		new Point('Volkstheater', 394, 299),
		new Point('Praterstern', -100, 411),
		new Point('Karlsplatz', 370, 450),
		new Point('Längenfeldgasse', 908, 367),
	),
	'answer' => array(
		'Westbahnhof',
		'Volkstheater',
		'Stephansplatz',
		'Karlsplatz',
	),
	'schematization' => 'modified',
	'visualization' => 'source based',
	'arrowhints' => false,
);
