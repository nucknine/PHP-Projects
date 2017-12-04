<?php
// Основные настройки
define(DB_HOST, 'localhost');
define(DB_LOGIN, 'root');
define(DB_PASSWORD, 'Mrinnovja69L');
define(DB_NAME, 'gbook');

$link = mysqli_connect(DB_HOST, DB_LOGIN, DB_PASSWORD, DB_NAME);

if(!$link) {
	echo "Ошибка N: "
		.mysqli_connect_errno()
		.' описание: '
		.mysqli_connect_error();
}

// Сохранение записи в БД
if($_SERVER["REQUEST_METHOD"] == 'POST'){
	$name = trim(strip_tags($_POST['name']));
	$email = trim(strip_tags($_POST['email']));
	$msg = trim(strip_tags($_POST['msg']));

	if($_COOKIE["name"] != $name || $_COOKIE["email"] != $email || $_COOKIE["msg"] != $msg) {
			setcookie("name", $name);
			setcookie("email", $email);
			setcookie("msg", $msg);
			// $_SESSION["name"] = $name;
			// $_SESSION["email"] = $email;
			// $_SESSION["msg"] = $msg;

			$sql = "INSERT INTO msgs(name, email, msg) VALUES('$name', '$email', '$msg')";
			$result = mysqli_query($link, $sql);
			if(!$result) {
			echo "Ошибка N: "
						.mysqli_errno()
						.' описание: '
						.mysqli_error();
			}
	} else {
		header("Location:".$_SERVER["PHP_SELF"]);
		die;
	}
} else {
	$name = $_COOKIE["name"];
	$email = $_COOKIE["email"];
	$msg = $_COOKIE["msg"];
}


//Вывод записей из БД
$sqlin = "SELECT id, name, email, msg, UNIX_TIMESTAMP(datetime) as dt FROM msgs GROUP BY id";
$resultin = mysqli_query($link, $sqlin);
$count = mysqli_num_rows($resultin);

$row = mysqli_fetch_all($resultin, MYSQLI_ASSOC);

mysqli_close($link);

?>