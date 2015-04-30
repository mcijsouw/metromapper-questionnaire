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
		echo '<div data-id="' . $this->id . '" class="point ' . $class . '" style="left: ' . $this->x . 'px; top: ' . $this->y . 'px"><div class="inner"></div></div>';
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
		echo '<input type="checkbox" name="intersections" value="' . $this->id . '"> ' . $this->id . ' &nbsp; &nbsp; ';
	}
	
}