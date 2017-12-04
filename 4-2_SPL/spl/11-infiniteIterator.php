<?php
class MyObject{
  private $flag;
  public function __construct(){
    $this->flag = rand(0, 4);
  }
  public function action(){
    $ret = (bool)$this->flag;
    echo "Done $this->flag\n";
    $this->flag = rand(0, 4);
    return $ret;
  }
}
$object1 = new MyObject();
$object2 = new MyObject();
$arrayIterator1 = new ArrayIterator( [$object1, $object2] );

$object3 = new MyObject();
$object4 = new MyObject();
$arrayIterator2 = new ArrayIterator( [$object3, $object4] );

$arrayIterator = new AppendIterator();
$arrayIterator->append($arrayIterator1);
$arrayIterator->append($arrayIterator2);
//Работа 4х обьектов пор очереди пока не выпадет 0
$it = new InfiniteIterator($arrayIterator);
foreach($it as $object){
  $result = $object->action();
  if(!$result) break;
  usleep(200000);
}
