<?php
error_reporting(E_ALL);
class A {
  private $varA;

  public function __construct() {
    $this->varA = 'A';
  }
  public function getA(){
    return $this->varA;
  }
}
class B extends A {
  private $varB;

  public function __construct() {
    parent::__construct();
    $this->varB = 'B';
  }

  public function __sleep() {
    return ['varB', 'varA'];
  }
}
$obj = new B();
$serialized = serialize($obj);
echo $serialized . "\n";
$restored = unserialize($serialized);
echo $restored->getA();
