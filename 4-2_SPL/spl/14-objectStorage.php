<?php
class Course{
  private $_name;
  public $test = "2323";
  public function __construct($name){
    $this->_name = $name;
  }
  public function __toString(){
    return strtoupper($this->_name);
  }
}

$courses = new SplObjectStorage();

$php = new Course('php');
$xml = new Course('xml');
$java = new Course('java');

$courses->attach($php);
$courses->attach($java);
// var_dump( $courses->contains($php) );
// var_dump( $courses->contains($xml) );
// var_dump( $courses->contains($java) );

$courses->attach($xml);
// var_dump( $courses->contains($xml) );

$courses->detach($java);
// var_dump( $courses->contains($java) );

$titles = [];
foreach ($courses as $course) {
  $titles[] = (string) $course;
}
// echo join(', ', $titles);


$storage= new SplObjectStorage();
$object1= (object) ['param'=> 'name'];
$object2= (object) ['param'=> 'numbers'];

$storage[$object1] = "John";

$storage[$object2] = [1, 2, 3];
$storage->attach($xml);
$storage->attach($object1);
$storage->attach($object2);




foreach($storage as $i => $key){
	// var_dump($i);
echo"Item ". ($i+1) .":";
var_dump($key, $key->test, $storage[$key]);
echo"\n";
}
