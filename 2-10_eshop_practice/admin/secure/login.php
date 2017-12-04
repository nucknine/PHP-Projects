<?
$title = 'Aвторизация';
$login  = $_POST['login'];
session_start();
header("HTTP/1.0 401 Unauthorized");
require_once "secure.inc.php";

if($_SERVER['REQUEST_METHOD'] =='POST') {

	$login = trim(strip_tags($_POST['login']));
	$pw = trim(strip_tags($_POST['pw']));
	$ref = trim(strip_tags($_GET['ref']));

	if(!$ref)
		$ref = '/PHP_lvl2_Secialist_mywork/10_eshop_practice/admin';
	if($login and $pw) {
		if($result = shop_user_exists($login)) {
			$list = explode(':', $result);
			$hash = $list[1];
			if(shop_check_hash($pw, $hash)) {
				$_SESSION['admin'] = true;
				header("Location:$ref");
				exit;
			} else {
				$title = '!Неверное имя пользователя или пароль';
			}
		} else {
			$title = 'Неверное имя пользователя или пароль';
		}
	} else {
		$title = 'Заполните все поля формы';
	}
}
?>
<!DOCTYPE HTML>
<html>
<head>
	<title>Авторизация</title>
	<meta charset="utf-8">
</head>
<body>
	<h1><?=$title?></h1>
	<form action="<?=$_SERVER['REQUEST_URI']?>" method="post">
		<div>
			<label for="txtUser">Логин</label>
			<input id="txtUser" type="text" name="login" value="<?=$login?>" />
		</div>
		<div>
			<label for="txtString">Пароль</label>
			<input id="txtString" type="password" name="pw" />
		</div>
		<div>
			<button type="submit">Войти</button>
		</div>
	</form>
	<?php
	$root = (!empty($_SERVER['HTTPS']) ? 'https' : 'http') . '://' . $_SERVER['HTTP_HOST'] . '/PHP_lvl2_Secialist_mywork/10_eshop_practice/';
	?>
	<p>Вернуться в <a href="<?=$root?>">каталог</a></p>
	<!-- <?=phpinfo()?> -->
</body>
</html>