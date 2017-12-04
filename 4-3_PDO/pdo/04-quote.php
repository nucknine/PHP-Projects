<?php

$db = new PDO("sqlite:users.db");


//INSERT
$name = $db->quote('Mike');
$email = $db->quote('mike@hotmail.com');
$count = $db->exec("INSERT INTO user(name, email) VALUES ('$name', '$email')");

echo $count;
