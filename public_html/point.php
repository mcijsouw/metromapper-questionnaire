<?php

class Point {
	
	public $id;
	public $x;
	public $y;
	
	public function __construct($id, $x, $y) {
		$this->id = $id;
		$this->x = $x;
		$this->y = $y;
	}
	
	public function render($class) {
		echo '<div data-id="' . $this->id . '" class="point ' . $class . '" data-x="' . $this->x . '" data-y="' . $this->y . '"><div class="inner"></div></div>';
	}
	
	public function renderIntersection() {
		$this->render('intersection');
	}
	
	public function renderStart() {
		$this->render('start');
	}
	
	public function renderEnd() {
		$this->render('end');
	}
	
	public function renderCheckbox() {
		echo '<input type="checkbox" class="hidden" name="intersections[]" value="' . htmlentities($this->id, ENT_SUBSTITUTE, 'ISO-8859-1') . '">';
	}
	
}