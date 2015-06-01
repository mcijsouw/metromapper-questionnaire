<?php
return array(
	'map' => 'Vienna-modified.graphml',
	'start' => new Point('start', 259, 646),
	'end' => new Point('end', 574, 213),
	'intersections' => array(
		new Point('Schottenring', 416, 173),
		new Point('Westbahnhof', 718, 292),
		new Point('Stephansplatz', 416, 489),
		new Point('Karlsplatz', 574, 646),
		new Point('Praterstern', 154, 226),
		new Point('Volkstheater', 574, 436),
		new Point('Schwedenplatz', 259, 331),
		new Point('Spittelau', 364, -62),
		new Point('Längenfeldgasse', 771, 449),
	),
	'answer' => array(
		'Schwedenplatz',
		'Schottenring',
	),
	'schematization' => 'modified',
	'visualization' => 'fixed source based',
	'arrowhints' => false,
	'averageEdgeTime' => 87,
);
