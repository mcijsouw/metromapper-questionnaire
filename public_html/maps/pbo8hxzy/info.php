<?php
return array(
	'map' => 'Vienna-modified.graphml',
	'start' => new Point('start', 845, 188),
	'end' => new Point('end', 180, 343),
	'intersections' => array(
		new Point('Schottenring', 463, 287),
		new Point('Westbahnhof', 789, 414),
		new Point('Stephansplatz', 463, 626),
		new Point('Karlsplatz', 633, 796),
		new Point('Landstraße', 294, 796),
		new Point('Volkstheater', 633, 569),
		new Point('Schwedenplatz', 294, 456),
		new Point('Spittelau', 407, 32),
		new Point('Längenfeldgasse', 845, 584),
	),
	'answer' => array(
		'Westbahnhof',
		'Volkstheater',
		'Stephansplatz',
		'Schwedenplatz',
	),
	'schematization' => 'modified',
	'visualization' => 'source based',
	'arrowhints' => true,
	'averageEdgeTime' => 87,
);
