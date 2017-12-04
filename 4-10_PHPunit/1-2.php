<?php
// Использование разных методов
class StackTest extends PHPUnit_Framework_TestCase{

  public function testEmpty(){
    $arr = [];
    $this->assertTrue(empty($arr));
  }

  public function testPush(){
    $arr = [];
    array_push($arr, 'foo');
    $this->assertEquals('foo', $arr[count($arr)-1]);
    $this->assertFalse(empty($arr));
  }

  public function testPop(array $arr){
    $arr = [];
    $this->assertEquals('foo', array_pop($arr));
    $this->assertTrue(empty($arr));
  }
}
?>