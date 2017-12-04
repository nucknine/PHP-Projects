<?php
$page = (int) $_GET['page'] ?: 1;
$perPage = 3;
$resultOffset = ($page * $perPage) - $perPage;
$data = [
  'John', 'Mike', 'Joe',
  'Вася', 'Петя', 'Федя',
  'Лена', 'Маша', 'Даша',
  'Саша'
];

$it = new ArrayIterator($data);

try{
  foreach(new LimitIterator($it, $resultOffset, $perPage) as $result) {
    echo "$result<br>";
  }
} catch (OutOfBoundsException $e) {
  echo 'Записей не найдено!';
} catch (Exception $e) {
  echo $e->getMessage();
}