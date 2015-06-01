<?php
return array(
	'map' => 'Vienna-modified.graphml',
	'start' => new Point('start', 323, 593),
	'end' => new Point('end', 626, 211),
	'intersections' => array(
		new Point('Schottenring', 435, 338),
		new Point('Stephansplatz', 626, 529),
		new Point('Karlsplatz', 626, 720),
		new Point('Landstraße', 817, 529),
		new Point('Volkstheater', 498, 593),
		new Point('Schwedenplatz', 626, 338),
		new Point('Spittelau', 323, 163),
		new Point('Längenfeldgasse', 387, 720),
	),
	'answer' => array(
		'Volkstheater',
		'Stephansplatz',
		'Schwedenplatz',
	),
	'schematization' => 'modified',
	'visualization' => 'all-pairs based',
	'arrowhints' => false,
	'averageEdgeTime' => 87,
);
