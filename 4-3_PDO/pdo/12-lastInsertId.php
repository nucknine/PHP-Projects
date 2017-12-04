<?php
try {
  $db = new PDO("sqlite:users.db");
  $db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

  $db->exec("INSERT INTO users(name, email) VALUES ('Joel', 'joel@mail.ru')");

  echo $db->lastInsertId();

}catch(PDOException $e){

  echo $e->getMessage();
}
