<?php
class Course{
  private $_name;
  public function __construct($name){
    $this->_name = $name;
  }
  public function __toString(){
    return strtolower($this->_name);
  }
  public function getName(){
    return $this->_name;
  }
}

$php = new Course('PHP');
$js = new Course('JavaScript');
$xml = new Course('XML');
$java = new Course('Java');
 
class CoursesHeap extends SplHeap{
  public function compare(Course $courseA, Course $courseB){
    return strcmp((string)$courseB, (string)$courseA);
  }
}

$coursesHeap = new CoursesHeap();

$coursesHeap->insert($php);
$coursesHeap->insert($xml);
$coursesHeap->insert($js);
$coursesHeap->insert($java);

foreach ($coursesHeap as $course) {
  print $course->getName() . "\n";
}
