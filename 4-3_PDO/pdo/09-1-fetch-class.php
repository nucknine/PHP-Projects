<?php
class User{

  public $id;
  public $email;
  public $name;

  public function __construct() {
    $this->id = 0;
    $this->name = 0;
    $this->email = 0;
  }
  public function nameToUpper(){
    return strtoupper($this->name);
  }
}


  $db = new PDO("sqlite:users.db");

  $sql = "SELECT * FROM user";

  $stmt = $db->query($sql);


  //свойства после отработки конструктора
  $obj = $stmt->fetchAll(PDO::FETCH_CLASS|PDO::FETCH_PROPS_LATE, 'User');
  //свойства до отработки конструктора
  // $obj = $stmt->fetchAll(PDO::FETCH_CLASS, 'User');


  var_dump($obj);

  die;

  $obj = $stmt->fetch(PDO::FETCH_CLASS, 'User');

  echo $obj->id.'<br>';
  echo $obj->nameToUpper().'<br>';
  echo $obj->email.'<br>';

  $db = null;
