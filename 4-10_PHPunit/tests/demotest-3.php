<?php
require_once('classes/somedemo.php');

class SomeDemoTest extends PHPUnit_Framework_TestCase {
	
  public function setUp() {
    $this->demo = new SomeDemo();
  }

  public function testDiv() {
    $this->assertEquals(1, $this->demo->div(2,2));
  }

  public function testMult() {
    $this->assertEquals(4, $this->demo->mult(2,2));
  }

  public function tearDown() {
    unset($this->demo);
  }
}
?>
