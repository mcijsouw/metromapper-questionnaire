<?php
return array(
	'map' => 'Vienna-raw.graphml',
	'start' => new Point('start', 552, 89),
	'end' => new Point('end', 666, 775),
	'intersections' => array(
		new Point('Schottenring', 209, 317),
		new Point('Stephansplatz', 323, 432),
		new Point('Westbahnhof', 780, 317),
		new Point('Karlsplatz', 438, 546),
		new Point('Praterstern', -19, 432),
		new Point('Landstraße', 209, 546),
		new Point('Volkstheater', 495, 375),
		new Point('Schwedenplatz', 209, 432),
		new Point('Spittelau', 95, 89),
		new Point('Längenfeldgasse', 895, 432),
	),
	'answer' => array(
		'Spittelau',
		'Schottenring',
		'Schwedenplatz',
		'Stephansplatz',
		'Karlsplatz',
	),
	'schematization' => 'raw',
	'visualization' => 'all-pairs based',
	'arrowhints' => false,
	'averageEdgeTime' => 87,
);
