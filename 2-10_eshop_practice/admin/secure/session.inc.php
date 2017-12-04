<?
//этот файл подключается во всех файлах папки admin и проверяет включчена ли сессия admin
session_start();
if(!isset($_SESSION['admin'])){ //Если сессии админ нет то кидаем на тоже место где пользователь был. Если есть то кидаем по ref в папку admin/index.php
	header('Location: /PHP_lvl2_Secialist_mywork/10_eshop_practice/admin/secure/login.php?ref='.$_SERVER['REQUEST_URI']);
	exit;
}