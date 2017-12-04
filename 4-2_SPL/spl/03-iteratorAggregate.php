<?php
class NumbersSquared implements Iterator {
  private $_cur;
  private $_obj;

  function __construct($obj){
    $this->_obj = $obj;
  }
  public function rewind(){
    $this->_cur = $this->_obj->getStart();
  }
  public function key(){
    return $this->_cur;
  }
  public function current(){
    return pow($this->_cur, 2);
  }
  public function next(){
    $this->_cur++;
  }
  public function valid(){
    return $this->_cur <= $this->_obj->getEnd();
  }
}
class NumbersSquareRoot implements Iterator {
  private $_cur;
  private $_obj;

  function __construct($obj){
    $this->_obj = $obj;
  }
  public function rewind(){
    $this->_cur = $this->_obj->getStart();
  }
  public function key(){
    return $this->_cur;
  }
  public function current(){
    return sqrt($this->_cur);
  }
  public function next(){
    $this->_cur++;
  }
  public function valid(){
    return $this->_cur <= $this->_obj->getEnd();
  }
}

class MathIterator implements IteratorAggregate {
  public $_start, $_end, $_action;

  public function __construct($start, $end, $action){
    $this->_start = $start;
    $this->_end = $end;
    $this->_action = $action;
  }
  public function getStart(){
    return $this->_start;
  }
  public function getEnd(){
    return $this->_end;
  }

  public function getIterator(){
    switch($this->_action){
      case 'pow':
        return new NumbersSquared($this); break;
      case 'sqrt':
        return new NumbersSquareRoot($this); break;
    }
  }

 /*
  public function setValues($from, $to){
    $this->_start = $from;
    $this->_end = $to;
  }
  public function setAction($action){
    $this->_action = $action;
  }
  */
}

$obj = new MathIterator(3, 7, 'pow');
foreach ($obj as $key => $value){
  print "Квадрат числа $key = $value<br>";
}
$obj = new MathIterator(3, 7, 'sqrt');
foreach ($obj as $key => $value){
  print "Квадратный корень числа $key = $value<br>";
}

/*
$obj = new MathIterator();
$obj->setValues(3, 7);
$obj->setAction("pow");
foreach ($obj as $key => $value){
  print "Квадрат числа $key = $value<br>";
}
*/