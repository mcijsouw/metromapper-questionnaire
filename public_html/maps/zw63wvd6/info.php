<?php
return array(
	'map' => 'Vienna-modified.graphml',
	'start' => new Point('start', 191, 215),
	'end' => new Point('end', 817, 150),
	'intersections' => array(
		new Point('Praterstern', 601, 366),
		new Point('Landstraße', 860, 798),
		new Point('Volkstheater', 428, 884),
		new Point('Schwedenplatz', 601, 539),
		new Point('Spittelau', 191, 301),
		new Point('Längenfeldgasse', 277, 1057),
		new Point('Schottenring', 342, 539),
		new Point('Westbahnhof', 191, 884),
		new Point('Stephansplatz', 601, 798),
		new Point('Karlsplatz', 601, 1057),
	),
	'answer' => array(
		'Spittelau',
		'Schottenring',
		'Schwedenplatz',
		'Praterstern',
	),
	'schematization' => 'modified',
	'visualization' => 'source based',
	'arrowhints' => true,
	'averageEdgeTime' => 87,
);
