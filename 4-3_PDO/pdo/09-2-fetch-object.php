<?php
class Users{

  public $id;
  public $email;
  public $name;

  public function nameToUpper(){
    return strtoupper($this->name);
  }
}


$db = new PDO("sqlite:users.db");

$sql = "SELECT * FROM user";

$stmt = $db->query($sql);

$obj = $stmt->fetchObject('Users');

echo $obj->id.'<br>';
echo $obj->nameToUpper().'<br>';
echo $obj->email.'<br>';

$db = null;
