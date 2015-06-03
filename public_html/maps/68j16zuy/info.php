<?php
return array(
	'map' => 'Vienna-raw.graphml',
	'start' => new Point('start', 900, 84),
	'end' => new Point('end', 114, 451),
	'intersections' => array(
		new Point('Karlsplatz', 534, 555),
		new Point('Landstraße', 324, 555),
		new Point('Volkstheater', 586, 398),
		new Point('Spittelau', 219, 136),
		new Point('Schwedenplatz', 324, 451),
		new Point('Längenfeldgasse', 953, 451),
		new Point('Schottenring', 324, 346),
		new Point('Stephansplatz', 429, 451),
		new Point('Westbahnhof', 848, 346),
	),
	'answer' => array(
		'Westbahnhof',
		'Volkstheater',
		'Stephansplatz',
		'Schwedenplatz',
	),
	'schematization' => 'raw',
	'visualization' => 'fixed',
	'arrowhints' => false,
	'averageEdgeTime' => 87,
);
