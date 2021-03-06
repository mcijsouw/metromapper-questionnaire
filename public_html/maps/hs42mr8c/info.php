<?php
return array(
	'map' => 'Vienna-modified.graphml',
	'start' => new Point('start', 685, 272),
	'end' => new Point('end', 728, 575),
	'intersections' => array(
		new Point('Praterstern', 469, 143),
		new Point('Volkstheater', 296, 661),
		new Point('Schwedenplatz', 469, 316),
		new Point('Spittelau', 59, 78),
		new Point('Längenfeldgasse', 145, 834),
		new Point('Schottenring', 210, 316),
		new Point('Westbahnhof', 59, 661),
		new Point('Stephansplatz', 469, 575),
		new Point('Karlsplatz', 469, 834),
	),
	'answer' => array(
		'Praterstern',
		'Schottenring',
		'Schwedenplatz',
	),
	'schematization' => 'modified',
	'visualization' => 'fixed source based',
	'arrowhints' => true,
	'averageEdgeTime' => 87,
);
