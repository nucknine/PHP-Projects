<?php
header("Cache-Control: no-cache, max-age=0");
session_start();
$msg="Введите тескт с картинки";
if($_SERVER['REQUEST_METHOD'] == 'POST') {
	if(isset($_SESSION['capcha'])) {
		if($_POST['capcha'] == strtolower($_SESSION['capcha'])) {
			$msg = "Форма отправлена!";
			$login = $_POST['login'];
			$pwd = $_POST['pwd'];
			session_destroy();
		} else {
			$msg = "Введите тескт с картинки верно";
			session_destroy();
		}
	}else {
		$msg = "Включите картинки!";
	}
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Capcha test</title>
	<link rel="stylesheet" href="capcha.css">
</head>
<body>
<div class="content">
	<div class="capcha"><?
	if($_SERVER['REQUEST_METHOD'] == 'GET') {
		echo "<img class=\"img\" src=\"noise-picture.php\" />";
	} else {
		echo "<img class=\"img\" src=\"noise-picture.php\" />";
	}
	?>
		<form class="refresh" action="<?=$_SERVER['PHP_SELF']?>" method="GET">
			<input class="refbtn" type="submit" name="submit" value="refresh">
		</form>
	</div>
	<div class="form">
	<form action="<?=$_SERVER['PHP_SELF']?>" method="POST">
		<input class="input"  name="login" type="text" placeholder="login">
		<input class="input" name="pwd" type="password" placeholder="password">
		<input class="input" name="capcha" type="text" placeholder="введите текст с картинки">
		<input class="input" name="submit" type="submit" value="ok">
	</form>
	</div>
		<p class="info"><?php
		echo "$msg </br>
			Login: $login </br>
			pwd: $pwd </br>";
		?></p>
</div>
</body>
</html>