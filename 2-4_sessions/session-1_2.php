<? session_start();

if ($_SERVER["REQUEST_METHOD"] == "POST") {
	$address = strip_tags($_POST["address"]);
	$zip = $_POST["zip"] * 1;

	$_SESSION["address"] = $address;
	$_SESSION["zip"] = $zip;
	$name = $_SESSION["name"];
}
else {
	$address = $_SESSION["address"];
	$zip = $_SESSION["zip"];
	$name = $_SESSION["name"];
}
 ?>
<!DOCTYPE HTML>
<html>
<head>
	<meta charset="utf-8">
	<title>Демо сессии</title>
</head>
<body>
<h1>Вопрос 2</h1>
<a href="session_destroy.php">Закрыть сессию</a><br><br>
<form action="<?=$_SERVER["PHP_SELF"]?>"
		method="post">
	Ваш адрес:
	<input type="text" name="address" value="<?=$address?>"><br>
	Ваш индекс:
	<input type="text" name="zip" value="<?=$zip?>"><br>
	<input type="submit" value="Передать">
</form>
<?
if ($address and $zip) {
	if ($address and $zip) {
		echo "<h1>Спасибо, $name, вы ответили на все вопросы</h1>";
		echo "<a href=session-2.php>Перейти к результату</a>";
	}
	else {
		print "<h3>Заполните все поля!</h3>";
	}
}
?>
</body>
</html>
