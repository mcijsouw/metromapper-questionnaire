<?php
return array(
	'map' => 'Vienna-raw.graphml',
	'start' => new Point('start', 796, 328),
	'end' => new Point('end', 167, 385),
	'intersections' => array(
		new Point('Schottenring', 167, 270),
		new Point('Stephansplatz', 281, 385),
		new Point('Westbahnhof', 738, 270),
		new Point('Karlsplatz', 396, 499),
		new Point('Praterstern', -61, 385),
		new Point('Landstraße', 167, 499),
		new Point('Volkstheater', 453, 328),
		new Point('Spittelau', 53, 42),
		new Point('Längenfeldgasse', 853, 385),
	),
	'answer' => array(
		'Westbahnhof',
		'Volkstheater',
		'Stephansplatz',
	),
	'schematization' => 'raw',
	'visualization' => 'fixed source based',
	'arrowhints' => false,
	'averageEdgeTime' => 87,
);
