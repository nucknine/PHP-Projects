<?php

if(is_file(PATH_LOG)) { //проверяем существует ли файл журнала
	$lines = file(PATH_LOG); //построчно записываем в массив файл журнала
	$countlines = (int)count($lines) + 1; //формируем номер записи в журнале
}
$dest = $_SERVER['REQUEST_URI']; //адрес страницы куда пришли
$ref = $_SERVER['HTTP_REFERER']; //адрес страницы откуда пришли
$t = time(); //timestamp метка
$dt = date("d.m.y|H:i:s", $t); // перевод в читаемый формат
$path = "$countlines) $dt | $ref | $dest \n"; //фомируем строку вывода
$f = fopen(PATH_LOG,"a+"); //открываем файл журнала на дозапись
fwrite($f, "$path"); //пишем строку
fclose($f);
?>