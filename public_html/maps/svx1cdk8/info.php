<?php
return array(
	'map' => 'Vienna-modified.graphml',
	'start' => new Point('start', 356, 97),
	'end' => new Point('end', 461, 596),
	'intersections' => array(
		new Point('Schottenring', 408, 333),
		new Point('Westbahnhof', 710, 452),
		new Point('Stephansplatz', 408, 649),
		new Point('Karlsplatz', 566, 806),
		new Point('Praterstern', 146, 386),
		new Point('Landstraße', 251, 806),
		new Point('Volkstheater', 566, 596),
		new Point('Schwedenplatz', 251, 491),
		new Point('Längenfeldgasse', 763, 609),
	),
	'answer' => array(
		'Schottenring',
		'Schwedenplatz',
		'Landstraße',
		'Stephansplatz',
	),
	'schematization' => 'modified',
	'visualization' => 'source based',
	'arrowhints' => true,
	'averageEdgeTime' => 87,
);
