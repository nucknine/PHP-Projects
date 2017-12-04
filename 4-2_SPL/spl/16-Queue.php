<?php
class Queue extends SplQueue{
  protected $dataStore = [];
  
  public function enqueue($element) {
    array_push($this->dataStore, $element);
    parent::enqueue($element);
  }
  public function dequeue() {
    array_shift($this->dataStore);
    return parent::dequeue();
  }
  public function toString() {
    $retStr = "";
    $cnt = count($this->dataStore);
    for ($i = 0; $i < $cnt; ++$i) {
      $retStr .= $this->dataStore[$i] . "\n";
    }
    return $retStr . "\n";
  }
}

$users = ["Вася", "Петя", "Федя", "Саша", "Зина", "Маша"];

$q = new Queue();

foreach($users as $user)
  $q->enqueue($user);  

echo "Кто в очереди:\n" . $q->toString();

echo $q->dequeue() . " вышел\n";
echo "Кто в очереди:\n" . $q->toString();

echo "Кто первый: " . $q->bottom() . "\n";
echo "Кто последний: " . $q->top() . "\n";