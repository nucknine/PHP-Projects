<? session_start();
$address = $_SESSION["address"];
$zip = $_SESSION["zip"];
$name = $_SESSION["name"];
$age = $_SESSION["age"];
 ?>
<!DOCTYPE HTML>
<html>
<head>
	<meta charset="utf-8">
	<title>Демо сессии</title>
</head>
<body>
<h1>Результаты теста</h1>
<a href="session-1.php">Демонстрация сессии</a><br>
<a href="session_destroy.php">Закрыть сессию</a><br><br>
<?
// if ($name and $age and $zip and $address) {

		echo "<h1>Дорогой, $name</h1>";
		echo "<h3>Тебе $age лет</h3>";
		echo "<p>Ты живешь по адресу: $address, $zip </p>";
	// }
	// else {
	// 	print "<h3>Заполните все поля!</h3>";
	// }
?>
</body>
</html>
