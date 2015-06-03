<?php
return array(
	'map' => 'Vienna-modified.graphml',
	'start' => new Point('start', 333, 673),
	'end' => new Point('end', 398, 155),
	'intersections' => array(
		new Point('Praterstern', 657, -17),
		new Point('Landstraße', 916, 414),
		new Point('Volkstheater', 484, 500),
		new Point('Schwedenplatz', 657, 155),
		new Point('Spittelau', 247, -82),
		new Point('Westbahnhof', 247, 500),
		new Point('Stephansplatz', 657, 414),
		new Point('Karlsplatz', 657, 673),
	),
	'answer' => array(
		'Karlsplatz',
		'Landstraße',
		'Schwedenplatz',
	),
	'schematization' => 'modified',
	'visualization' => 'source based',
	'arrowhints' => true,
	'averageEdgeTime' => 87,
);
