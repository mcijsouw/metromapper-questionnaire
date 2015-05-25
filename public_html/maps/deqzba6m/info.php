<?php
return array(
	'map' => 'Vienna',
	'start' => new Point('start', 333, 223),
	'end' => new Point('end', 747, 638),
	'intersections' => array(
		new Point('Praterstern', 688, 105),
		new Point('Landstraße', 570, 460),
		new Point('Volkstheater', 333, 460),
		new Point('Schwedenplatz', 570, 223),
		new Point('Spittelau', 333, -131),
		new Point('Längenfeldgasse', 96, 816),
		new Point('Schottenring', 451, 105),
		new Point('Westbahnhof', 96, 579),
		new Point('Stephansplatz', 451, 342),
		new Point('Karlsplatz', 451, 579),
	),
	'answer' => array(
		'Volkstheater',
		'Stephansplatz',
		'Landstraße',
	),
	'schematization' => 'modified',
	'visualization' => 'source based',
	'arrowhints' => false,
);
