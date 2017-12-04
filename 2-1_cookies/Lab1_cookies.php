<?php
	//Лаба1 1:00:00 модуль 1. PHP Уровень 2. COOKIE
	$visitCounter = 0;
	$lastVisit = "";

	//Проверяем если запись в массиве COOKIE
	//Если есть значит это не первое посещение, а значит увеличиваем счетчик
	if(isset($_COOKIE["visitCounter"])) {
		$visitCounter = $_COOKIE["visitCounter"];
		$visitCounter++;
	}

	//Проверяем если запись в массиве COOKIE
	//Если есть значит это не первое посещение, а значит обновляем дату
	if(isset($_COOKIE["lastVisit"])) {
		$lastVisit = date("d-m-Y H-m-s", $_COOKIE["lastVisit"]);
	}

	//Записываем данные в куки
	//Если это тот же день то не запись не делаем!
	if(date('d-m-Y', $_COOKIE['lastVisit']) != date('d-m-Y')) {
		setcookie("lastVisit", time(), time()+0x7FFFFFFF);
		setcookie("visitCounter", $visitCounter, time()+0x7FFFFFFF);
	}

	//Вывод Кук и сообщения о посещении!

	if(visitCounter == 1) {
		echo "Вы зашли к нам в первый раз";
	} else {
		echo "Вы зашли к нам в $visitCounter раз, последнее посещение было: $lastVisit";
	}
?>