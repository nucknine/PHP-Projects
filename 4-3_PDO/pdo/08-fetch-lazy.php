<?php

$db = new PDO("sqlite:users.db");

$sql = "SELECT * FROM user";

$stmt = $db->query($sql);

$result = $stmt->fetch(PDO::FETCH_LAZY);

echo $result[0].'<br>';
echo $result['name'].'<br>';
echo $result->email.'<br>';
