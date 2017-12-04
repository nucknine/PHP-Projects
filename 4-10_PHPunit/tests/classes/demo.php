<?php
class Demo {

  public function sum($a,$b) {
    return $a+$b;
  }
  public function dummy($a,$b) {
    return "nothing";
    if($a==100) $b=0;
  }
  public function subtract($a,$b) {
    return $a-$b;
  }
}