<?php
class Window {
	public $dialog = false;
	public $modal = false;
	public $visible = false;

	function __construct($d, $m, $v) {
		$this->dialog = $d;
		$this->modal = $m;
		$this->visible = $v;
	}
}

class CreateWindow {
	public $dialog = false;
	public $modal = false;
	public $visible = false;

	function setDialog($flag){
		$this->dialog = $flag;
		return $this;
	}

	function setModal($flag){
		$this->modal = $flag;
		return $this;
	}

	function setVisible($flag){
		$this->visible = $flag;
		return $this;
	}
	//создание класса Window внутри CreateWindow за счет чего параметры окна можно задавать в любом порядке
	function create() {
		return new Window($this->dialog, $this->modal, $this->visible);
	}
}

$c = new CreateWindow;
$w = $c->setVisible(true)->setDialog(true)->create();

var_dump($w);