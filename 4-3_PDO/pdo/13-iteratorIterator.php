<?php
$db = new PDO('sqlite:users.db');

$stmt = $db->query('SELECT * FROM user');
$stmt->setFetchMode(PDO::FETCH_ASSOC);

$iterator = new IteratorIterator($stmt);

$limitIterator = new LimitIterator($iterator, 0, 3);

$tenRecordArray = iterator_to_array($limitIterator);

print_r($tenRecordArray);