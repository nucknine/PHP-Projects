<?php
require_once('classes/demo.php');

class DemoTest extends PHPUnit_Framework_TestCase {
  
  public function testSum() {
    $demo = new Demo();
    $this->assertEquals(4, $demo->sum(2,2));
    $this->assertNotEquals(3, $demo->sum(1,1));
  }
  
}
