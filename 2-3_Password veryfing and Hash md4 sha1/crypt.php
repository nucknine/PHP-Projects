<?php

if($_SERVER["REQUEST_METHOD"] == "POST") {
	$str = strip_tags($_POST["str"]);
	setcookie("pwd", $str);
	header("Location: " . $_SERVER["PHP_SELF"]);
	exit;
}

?>
<!DOCTYPE HTML>
<html>
<head>
	<meta charset="utf-8" />
	<title>Стойкое хеширование с солью</title>
</head>
<body>
<?php
$str=$_COOKIE['pwd'];
echo $str;
?>
<h1>Стойкое хеширование с солью</h1>
<form action="<?=$_SERVER["PHP_SELF"]?>" method="post">
	Строка:
	<input type="text" name="str" value="<?=$str?>">
	<input type="submit" name="sub" value="Проверить!">
</form>
<?php
// Хэш для строки "password"
$hash = password_hash("password", PASSWORD_BCRYPT);
// $hash = '$2y$10$qb.toUZtlEeElHf2XprIyexf.5JnMluJYtssNjcuQk0tIu4if0f8K';

 if ($str) {
	if( password_verify($str, $hash) )
		echo "Пароль верный";
	else
		echo "Пароль не верный";
}
?>
</body>
</html>
