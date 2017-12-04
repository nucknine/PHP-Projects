<?
error_reporting(0);
$link = mysqli_connect('localhost', 'root', 'Mrinnovja69L', 'web'); //Установка соединения
$result = mysqli_query($link, "SET NAMES 'utf8'"); //Запрос без выборки результат true или false

if(!$result) { //Отслеживание ошибки MySQL
	echo mysqli_errno($link);
	echo "<br>";
	echo mysqli_error($link);
}

mysqli_close($link); //Закрытие соединения