<?php
class Client{
  public $name;
  public $priority;
  public function __construct($name, $priority){
    $this->name = $name;
    $this->priority = $priority;
  }
}

class PriorityQueue extends SplPriorityQueue{
  private $dataStore = [];

  function insert($value, $priority){
    array_push($this->dataStore, $value);
    usort($this->dataStore, function($a, $b){
      return $b->priority - $a->priority;
    });
    parent::insert($value, $priority);
  }

  function extract(){
    array_shift($this->dataStore);
    return parent::extract();
  }

  function toString() {
    $retStr = "";
    $cnt = count($this->dataStore);
    for ($i = 0; $i < $cnt; ++$i) {
      $retStr .= $this->dataStore[$i]->name . " номер: "
		      . $this->dataStore[$i]->priority . "\n";
    }
    return $retStr . "\n";
  }
}

$bank = new PriorityQueue();
$clients = ["Пупкин", "Сумкин", "Корзинкина", "Морковкин", "Зайцев"];
shuffle($clients);

foreach($clients as $p => $client){
  $bank->insert(new Client($client, $p+1), $p+1);
}

print($bank->toString());

$current = $bank->extract();

print("Обслуживается: " . $current->name . "\n");
print("Ожидают очереди:\n");
print($bank->toString());

exit;

$current = $bank->extract();
print("Обслуживается: " . $current->name . "\n");
print("Ожидают очереди:\n");
print($bank->toString());

$current = $bank->extract();
print("Обслуживается: " . $current->name . "\n");
print("Ожидают очереди:\n");
print($bank->toString());
