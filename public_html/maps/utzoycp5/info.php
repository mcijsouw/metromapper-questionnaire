<?php
return array(
	'map' => 'Vienna-modified.graphml',
	'start' => new Point('start', 305, 249),
	'end' => new Point('end', 510, 778),
	'intersections' => array(
		new Point('Praterstern', 510, 113),
		new Point('Landstraße', 714, 454),
		new Point('Volkstheater', 373, 522),
		new Point('Schwedenplatz', 510, 249),
		new Point('Spittelau', 186, 62),
		new Point('Längenfeldgasse', 254, 658),
		new Point('Westbahnhof', 186, 522),
		new Point('Stephansplatz', 510, 454),
		new Point('Karlsplatz', 510, 658),
	),
	'answer' => array(
		'Schwedenplatz',
		'Stephansplatz',
		'Karlsplatz',
	),
	'schematization' => 'modified',
	'visualization' => 'fixed source based',
	'arrowhints' => true,
	'averageEdgeTime' => 87,
);
