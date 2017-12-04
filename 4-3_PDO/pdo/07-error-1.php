<?php
try {
  $db = new PDO("sqlite:users.db");

  echo 'Connected to database<br>';

  $db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

  $sql = "SELECT username FROM user";
  foreach ($db->query($sql) as $row){
    print $row['name'] .' - '. $row['email'] . '<br>';
  }

  $db = null;
}catch(PDOException $e){
  echo $e->getMessage();
}
