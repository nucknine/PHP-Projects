<?php
if(is_file(PATH_LOG)) { //проверяем существует ли файл журнала
	$lines = file(PATH_LOG); //построчно записываем в массив файл журнала
	$countlines = (int)count($lines); //считаем количество строк
	if ($countlines > 10) { //если больше 10 то выводим только последние 10
		for($i = ($countlines - 10); $i < $countlines; $i++) {
			echo "<p>{$lines[$i]}</p>";
			}
	} else { //иначе выводим все первые строки до 10
		for($i = 0; $i < $countlines; $i++) {
			echo "<p>{$lines[$i]}</p>";
			}
	}
} else {
	echo "<p><b>Файл журнала не доступен</b></p>";
}
?>