<?php
error_reporting(E_ALL);
class A implements Serializable{
  private $varA;
    public function __construct() {
    $this->varA = 'A';
  }
  public function serialize() {
    return serialize($this->varA);
  }
  public function unserialize($serialized) {
    $this->varA = unserialize($serialized);
  }
  public function getA() {
    return $this->varA;
  }
}

class B extends A {
  private $varB;
  public function __construct() {
    parent::__construct();
    $this->varB = 'B';
  }
  public function serialize() {
    $aSerialized = parent::serialize();
    return serialize([$this->varB, $aSerialized]);
  }
  public function unserialize( $serialized ) {
    $temp = unserialize($serialized);
    $this->varB = $temp[0];
    parent::unserialize($temp[1]);
  }
}
$obj = new B();
$serialized = serialize($obj);
echo $serialized . "\n";
$restored = unserialize($serialized);
echo $restored->getA();
