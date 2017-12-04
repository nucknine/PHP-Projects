<?php
$col = 'gf';

setlocale(LC_ALL, "russian");
$day = strftime('%d');
$mon = strftime('%B');
$mon = iconv('windows-1251', 'UTF-8', $mon);
$year = strftime('%Y');

//Массив с меню
$leftMenu=[
['link'=>'Calc','href'=>'index.php?id=calc', 'id'=>'calc'],
['link'=>'Table', 'href'=>'index.php?id=table', 'id'=>'table'],
['link'=>'Log', 'href'=>'index.php?id=log', 'id'=>'log'],
['link'=>'Contacts','href'=>'index.php?id=contacts', 'id'=>'contacts']
];

?>