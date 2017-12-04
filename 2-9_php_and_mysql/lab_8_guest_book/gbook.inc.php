<?php
// Основные настройки
define(DB_HOST, 'localhost');
define(DB_LOGIN, 'root');
define(DB_PASSWORD, 'Mrinnovja69L');
define(DB_NAME, 'gbook');

$link = mysqli_connect(DB_HOST, DB_LOGIN, DB_PASSWORD, DB_NAME);

if(!$link) {
	echo "Ошибка N: "
		.mysqli_errno()
		.' описание: '
		.mysqli_error();
}

// Сохранение записи в БД
if($_SERVER["REQUEST_METHOD"] == 'post'){
	$name = trim(strip_tags($_POST['name']));
	$email = trim(strip_tags($_POST['email']));
	$msg = trim(strip_tags($_POST['msg']));

	echo "$name, $email, $msg";
	// header("Location:".$_SERVER["PHP_SELF"]);
	// exit;
}

// $sql = "INSERT INTO msgs('name','email','msg') VALUES('$name', '$email', '$msg')";
// $result = mysqli_query($link, $sql);
?>