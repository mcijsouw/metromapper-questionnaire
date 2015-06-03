<?php
return array(
	'map' => 'Vienna-modified.graphml',
	'start' => new Point('start', 474, 188),
	'end' => new Point('end', 78, 507),
	'intersections' => array(
		new Point('Karlsplatz', 793, 565),
		new Point('Stephansplatz', 793, 333),
		new Point('Praterstern', 793, -53),
		new Point('Landstraße', 1025, 333),
		new Point('Volkstheater', 638, 410),
		new Point('Schwedenplatz', 793, 101),
		new Point('Spittelau', 426, -111),
		new Point('Längenfeldgasse', 503, 565),
		new Point('Schottenring', 561, 101),
		new Point('Westbahnhof', 426, 410),
	),
	'answer' => array(
		'Volkstheater',
		'Karlsplatz',
		'Längenfeldgasse',
	),
	'schematization' => 'modified',
	'visualization' => 'fixed source based',
	'arrowhints' => true,
	'averageEdgeTime' => 87,
);
