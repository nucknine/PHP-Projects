<?php
try {
  $db = new PDO("sqlite:users.db");
  $db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

  $id = 6;

  $stmt = $db->prepare("SELECT * FROM user WHERE id = :id");

  $stmt->bindParam(':id', $id, PDO::PARAM_INT);

  $stmt->execute();

  //$result = $stmt->fetchAll();

  while($row = $stmt->fetch()){
    echo $row['id'].'<br>';
    echo $row['name'].'<br>';
    echo $row['email'];
  }

  $db = null;
}catch(PDOException $e){
  echo $e->getMessage();
}

?>