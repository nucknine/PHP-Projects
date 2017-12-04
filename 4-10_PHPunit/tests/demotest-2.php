<?php
require_once('classes/demo.php');

class DemoTest extends PHPUnit_Framework_TestCase {
	
  public function setUp() {
    $this->demo = new Demo();
  }

  public function testSum() {
    $this->assertEquals(4, $this->demo->sum(2,2));
  }

  public function testSubtract() {
    $this->assertEquals(0, $this->demo->subtract(2,2));
  }

  public function tearDown() {
    unset($this->demo);
  }
}
