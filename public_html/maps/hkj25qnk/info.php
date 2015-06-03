<?php
return array(
	'map' => 'Vienna-raw.graphml',
	'start' => new Point('start', 382, 490),
	'end' => new Point('end', 751, 305),
	'intersections' => array(
		new Point('Praterstern', 566, 182),
		new Point('Landstraße', 505, 367),
		new Point('Volkstheater', 259, 428),
		new Point('Spittelau', 320, 59),
		new Point('Schwedenplatz', 443, 305),
		new Point('Längenfeldgasse', 74, 674),
		new Point('Schottenring', 382, 243),
		new Point('Stephansplatz', 382, 367),
		new Point('Westbahnhof', 74, 551),
	),
	'answer' => array(
		'Stephansplatz',
		'Schwedenplatz',
		'Praterstern',
	),
	'schematization' => 'raw',
	'visualization' => 'fixed source based',
	'arrowhints' => false,
	'averageEdgeTime' => 87,
);
