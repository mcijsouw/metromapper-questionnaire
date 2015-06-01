<?php
return array(
	'map' => 'Vienna-raw.graphml',
	'start' => new Point('start', 477, 667),
	'end' => new Point('end', 248, 552),
	'intersections' => array(
		new Point('Schottenring', 534, 152),
		new Point('Stephansplatz', 648, 267),
		new Point('Westbahnhof', 1105, 152),
		new Point('Karlsplatz', 763, 381),
		new Point('Praterstern', 305, 267),
		new Point('Landstra�e', 534, 381),
		new Point('Volkstheater', 820, 210),
		new Point('Schwedenplatz', 534, 267),
		new Point('Spittelau', 420, -75),
		new Point('L�ngenfeldgasse', 1220, 267),
	),
	'answer' => array(
		'Landstra�e',
		'Stephansplatz',
		'Schwedenplatz',
		'Praterstern',
	),
	'schematization' => 'raw',
	'visualization' => 'fixed source based',
	'arrowhints' => true,
	'averageEdgeTime' => 87,
);
