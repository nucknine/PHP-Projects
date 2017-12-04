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

$stmt->setFetchMode(PDO::FETCH_INTO, new Users);

while($arr = $stmt->fetch())
  print_r($arr);	
/*foreach($stmt as $user){
  echo $user->nameToUpper().'<br>';
}
*/
$db = null;
/*
$user = new Users();
$stmt->setFetchMode(PDO::FETCH_INTO, $user);
$stmt->execute();
$user= $stmt->fetch(PDO::FETCH_INTO);
*/
