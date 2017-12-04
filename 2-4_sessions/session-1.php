<?
session_start();
ini_set('session.cache_expire', '1');
ini_set('session.gc_maxlifetime', '5');
// ini_set('session.name', '10');

if ($_SERVER["REQUEST_METHOD"] == "POST") {
	$name = strip_tags($_POST["name"]);
	$age = $_POST["age"] * 1;

	$_SESSION["name"] = $name;
	$_SESSION["age"] = $age;
}
else {
	$name = $_SESSION["name"];
	$age = $_SESSION["age"];
}
?>
<!DOCTYPE HTML>

<html>
<head>
	<meta charset="utf-8">
	<title>Демонстрация сессии</title>
</head>

<body>
<h1>Вопрос 1</h1>
<a href="session_destroy.php">Закрыть сессию</a><br><br>
<form action="<?=$_SERVER["PHP_SELF"]?>"
		method="post">
	Ваше имя:
	<input type="text" name="name" value="<?=$name?>"><br>
	Ваш возраст:
	<input type="text" name="age" value="<?=$age?>"><br>
	<input type="submit" value="Передать">
</form>
<?
if ($name and $age) {
	if ($name and $age) {
		echo "<h1>Привет, $name, вы ответили на первый вопрос</h1>";
		echo "<a href='session-1_2.php'>Перейти к следующему вопросу</a>";
	}
	else {
		print "<h3>Заполните все поля!</h3>";
	}
}
?>


</body>
</html>
