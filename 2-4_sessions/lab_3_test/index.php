<?
session_start();
if(!isset($_SESSION['test']) and !isset($_POST['q'])){
	//Проверяем первый ли это запуск теста. Если да то инициализируем переменные
	$q = 0; // номер текущего вопроса
	$title = 'Вы в начале. Пройдите тест'; //заголовок страницы
} else {
	if($_POST['reset'] == 'true') {
		session_destroy();
		$_POST['reset'] = false;
	}
	//Иначе создаем сессионную переменную с массивом ответов
	if($_POST['q'] != '1')
		$_SESSION['test'][] = $_POST['answer'];
	$q = $_POST['q'];
	$title = $_POST['title'];
}
?>
<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<title>Тест</title>
</head>
<body>

<table width="50%" border="1" align='center'>

<tr>
	<td align="center">
		<!-- Верхняя часть страницы -->
		<table width="100%">
			<tr>
				<td align="center">
					<h1><?=$title?></h1>
				</td>
				<td align="left">
				<form action='<?php echo $_SERVER['REQUEST_URI']?>' method='post'>
					<input type='hidden' name='q' value='0'>
					<input type='hidden' name='title' value='Вы в начале. Пройдите тест'>
					<input type='hidden' name='reset' value='true'>
					<input type='submit' value='Начать тест заново'>
				</form>
			</tr>
		</table>
		<!-- Верхняя часть страницы -->
	</td>
</tr>
<tr>
	<td>
		<!-- Область основного контента -->
		<?php
		// В зависимости от номера вопроса,
		// подключаем соответствующий файл с вопросами
		switch ($q) {
			case '0':
				include 'start.php';
				break;
			case '1':
				include 'q1.php';
				break;
			case '2':
				include 'q2.php';
				break;
			case '3':
				include 'q3.php';
				break;
			default:
				include 'result.php';
				break;
		}
		?>
		<!-- Область основного контента -->
	</td>
</tr>
</table>

</body>
</html>