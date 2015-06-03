<?php
return array(
	'map' => 'Vienna-raw.graphml',
	'start' => new Point('start', 357, 113),
	'end' => new Point('end', 472, 570),
	'intersections' => array(
		new Point('Praterstern', 14, 456),
		new Point('Landstra�e', 243, 570),
		new Point('Volkstheater', 529, 399),
		new Point('Spittelau', 129, 113),
		new Point('Schwedenplatz', 243, 456),
		new Point('L�ngenfeldgasse', 929, 456),
		new Point('Schottenring', 243, 341),
		new Point('Stephansplatz', 357, 456),
		new Point('Westbahnhof', 814, 341),
	),
	'answer' => array(
		'Spittelau',
		'Schottenring',
		'Schwedenplatz',
		'Landstra�e',
	),
	'schematization' => 'raw',
	'visualization' => 'source based',
	'arrowhints' => false,
	'averageEdgeTime' => 87,
);
