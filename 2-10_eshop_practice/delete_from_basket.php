<?php
	// подключение библиотек
	require "inc/lib.inc.php";
	require "inc/config.inc.php";

	$id = (int)$_GET["id"]; //при нажатии на кнопку "В корзину" принимаем id со страницы basket.php и приводим значение к числу
	if($id) {
		shop_delete_from_basket($id); //если id не равен нулю то вызываем функцию которая удаляет товар из корзины из $basket
	}
	header("Location: basket.php"); //перенаправляем пользователя обратно на страницу корзины
	exit; //завершаем скрипт
