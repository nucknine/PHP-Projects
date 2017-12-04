<?php
class Db{
  private $_db;
  function __construct(){
    $this->_db = new SQLite3("users.db");
    if(filesize("users.db") == 0) {
    $sql = 'CREATE TABLE users(
        name TEXT,
        inn INTEGER
        )';
        $this->_db->exec($sql);
      }
  }
  function __destruct(){
    unset($this->_db);
  }
  public function userExists($name){
    return (boolean) $this->_db->query("SELECT count(*) FROM users WHERE name = '$name'");
  }
  public function getUserInn($name){
    return $this->_db->querySingle("SELECT inn FROM users WHERE name = '$name'");
  }
  public function setUser($name, $inn){
    $this->_db->exec("INSERT INTO users VALUES('$name', $inn)");
  }
  public function removeUser($name){
    $this->_db->exec("DELETE FROM users WHERE name='$name'");
  }
}

class UserMap implements ArrayAccess {
  private $_db;
  function __construct(Db $db){
    $this->_db = $db;
  }
  function __destruct(){
    unset($this->_db);
  }
  function offsetExists($name) {
    return $this->_db->userExists($name);
  }
  function offsetGet($name) {
    return $this->_db->getUserInn($name);
  }
  function offsetSet($name, $inn) {
    $this->_db->setUser($name, $inn);
  }
  function offsetUnset($name) {
    $this->_db->removeUser($name);
  }
}
$users = new UserMap(new Db());

if(isset($users["Вася Пупкин"]))
  print "ИНН пользователя Вася Пупкин - " . $users["Вася Пупкин"];

if(!isset($users["Федя Сумкин"]))
  $users["Федя Сумкин"] = 11134567890;

if(isset($users["Коля Романов"]))
  unset($users["Коля Романов"]);

unset($users["Вася Пупкин"]);
$users["Вася Пупкин"] = 3333337890;