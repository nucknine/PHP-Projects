<pre>
<?php
try {
  $db = new PDO("sqlite:users.db");

  echo 'Connected to database<br>';

}catch(PDOException $e){
  echo $e->getMessage();
}

$sql = "SELECT username FROM user";

$result = $db->query($sql);

echo $db->errorCode();
print_r($db->errorInfo());
