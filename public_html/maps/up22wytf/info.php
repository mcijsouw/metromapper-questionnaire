<?php
return array(
	'map' => 'Vienna-modified.graphml',
	'start' => new Point('start', 472, 40),
	'end' => new Point('end', 553, 640),
	'intersections' => array(
		new Point('Schottenring', 390, 312),
		new Point('Westbahnhof', 294, 531),
		new Point('Stephansplatz', 553, 476),
		new Point('Praterstern', 553, 203),
		new Point('Landstraße', 717, 476),
		new Point('Volkstheater', 444, 531),
		new Point('Schwedenplatz', 553, 312),
		new Point('Spittelau', 294, 162),
		new Point('Längenfeldgasse', 349, 640),
	),
	'answer' => array(
		'Spittelau',
		'Schottenring',
		'Schwedenplatz',
		'Landstraße',
	),
	'schematization' => 'modified',
	'visualization' => 'source based',
	'arrowhints' => true,
	'averageEdgeTime' => 87,
);
