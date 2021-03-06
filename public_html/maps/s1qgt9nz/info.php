<?php
return array(
	'map' => 'Sydney-raw.graphml',
	'start' => new Point('start', 525, 156),
	'end' => new Point('end', 525, 513),
	'intersections' => array(
		new Point('Merrylands', 465, 215),
		new Point('Hornsby', 822, -676),
		new Point('Cabramatta', 168, 513),
		new Point('Sydenham', 1298, 632),
		new Point('Blacktown', 227, -260),
		new Point('Glenfield', -70, 751),
		new Point('Lidcombe', 703, 335),
		new Point('Town Hall', 1596, 394),
		new Point('Clyde', 584, 275),
		new Point('Granville', 525, 215),
		new Point('Redfern', 1477, 454),
		new Point('Sutherland', 525, 1346),
		new Point('Central', 1537, 454),
		new Point('d0', 1715, 335),
		new Point('Wynyard', 1596, 335),
		new Point('Strathfield', 882, 335),
		new Point('Wolli Creek', 1179, 751),
	),
	'answer' => array(
		'Granville',
		'Clyde',
		'Lidcombe',
	),
	'schematization' => 'raw',
	'visualization' => 'all-pairs based',
	'arrowhints' => false,
	'averageEdgeTime' => 158,
);
