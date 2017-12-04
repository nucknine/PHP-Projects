<?php
//Lab 2.1. Exponentiation inputed sequence of numbers in object

class NumbersSquared implements Iterator {
	private $start;
	private $end;
	private $current;

	public function __construct($start, $end) {
		$this->start = $start;
		$this->end = $end;
	}

	public function rewind(){
		$this->current = $this->start;
	}

	public function current(){
		return $this->current*$this->current;
	}

	public function key(){
		return $this->current;
	}

	public function next(){
		return $this->current++;
	}

	public function valid(){
		 $var = $this->current <= $this->end;
		 return $var;
	}

}

//Using

$obj = new NumbersSquared(1, 17);

foreach ($obj as $num => $square) {
	echo "Квадрат числа $num = $square\n";
}