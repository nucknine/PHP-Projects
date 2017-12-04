<?php
/***interface Strategy***/
interface Strategy{
	function doOperation($n1, $n2);
}

/***Rectangle***/
class Add implements Strategy {
	function doOperation($n1, $n2) {
		$s = $n1 + $n2;
		echo __CLASS__.' '.$s."\n";
	}
}

/***Circle***/
class Substr implements Strategy {
	function doOperation($n1, $n2) {
		$s = $n1 - $n2;
		echo __CLASS__.' '.$s."\n";
	}
}

/***Square***/
class Multi implements Strategy {
	function doOperation($n1, $n2) {
		$s = $n1 * $n2;
		echo __CLASS__.' '.$s."\n";
	}
}

/***class ShapeFactory ****/
class Context {

	private $strategy;

	function __construct($op) {
		switch($op) {
			case "+" : $this->strategy = new Add; break;
			case "-" : $this->strategy = new Substr; break;
			case "*" : $this->strategy = new Multi; break;
			default : throw new Exception("$op is wrong type!\n");
		}
	}

	function executeStrategy($n1, $n2) {
		// $strategy = strToUpper($strategy);
		return $this->strategy->doOperation($n1, $n2);
	}
}

/***Using***/
$Context = new Context('*');


$add = $Context->executeStrategy(4,6);

