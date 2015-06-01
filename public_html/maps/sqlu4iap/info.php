<?php
return array(
	'map' => 'Vienna-raw.graphml',
	'start' => new Point('start', 927, 513),
	'end' => new Point('end', 356, 399),
	'intersections' => array(
		new Point('Schottenring', 70, 227),
		new Point('Stephansplatz', 184, 342),
		new Point('Westbahnhof', 641, 227),
		new Point('Karlsplatz', 299, 456),
		new Point('Praterstern', -158, 342),
		new Point('Landstraße', 70, 456),
		new Point('Volkstheater', 356, 285),
		new Point('Schwedenplatz', 70, 342),
		new Point('Spittelau', -43, 0),
		new Point('Längenfeldgasse', 756, 342),
	),
	'answer' => array(
		'Längenfeldgasse',
		'Westbahnhof',
		'Volkstheater',
	),
	'schematization' => 'raw',
	'visualization' => 'all-pairs based',
	'arrowhints' => false,
	'averageEdgeTime' => 87,
);
