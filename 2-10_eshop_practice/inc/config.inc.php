<?php
const SERVER_ROOT = 'php-lvl2.local/PHP_lvl2_Secialist_mywork/10_eshop_practice/';
//<!-- настройки сайта и константы -->
define(DB_HOST, 'localhost'); //хранениe адреса сервера баз данных mySQL
define(DB_LOGIN, 'root'); //хранениe логина сервера баз данных mySQL
define(DB_PASSWORD, 'Mrinnovja69L'); //хранениe пароля сервера баз данных mySQL
define(DB_NAME, 'eshop'); //хранениe пароля сервера баз данных mySQL
define(ORDERS_LOG, 'orders.log'); //хранение имени файла с личными данными пользователей
setcookie('test', 'test', 0x7FFFFFFF);

$basket = []; //массив для хранения корзины пользователя


$count = 0; //количество товаров в корзине пользователя

$link = mysqli_connect(DB_HOST, DB_LOGIN, DB_PASSWORD, DB_NAME); //Установка соединения с сервером базы данных MySQL

if(!$link) { //отслеживаем возможную ошибку
	echo 'Ошибка N: '
		.mysqli_connect_errno()
		.': '
		.mysqli_connect_error();
	}

shop_basket_init(); //Создание или чтение корзины
