<?php
try {
  $db = new PDO("sqlite:test.db");
  $db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

  $db->beginTransaction();

  $table = "CREATE TABLE goods (
                      id INTEGER PRIMARY KEY,
                      name TEXT,
                      price INTEGER)";
  $db->exec($table);

  $db->exec("INSERT INTO goods (name, price) VALUES ('One', 100)");
  $db->exec("INSERT INTO goods (name, price) VALUES ('Two', 200)");
  $db->exec("INSERT INTO goods (name, price) VALUES ('Three', 300)");
  $db->exec("INSERT INTO goods (name, price) VALUES ('Four', 400)");
  $db->exec("INSERT INTO goods (name, price) VALUES ('Five', 500)");
  $db->exec("INSERT INTO goods (name, price) VALUES ('Six', 600)");

  $db->commit();

  echo 'Всё прошло удачно.<br>';

}catch(PDOException $e){

  $db->rollback();

  echo $e->getMessage();
}

?>