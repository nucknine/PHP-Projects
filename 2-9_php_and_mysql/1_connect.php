<?
error_reporting(0);
$link = mysqli_connect('localhost', 'root', 'Mrinnovja69L', 'web'); //Установка соединения

var_dump($link);

mysqli_select_db($link, "test"); //Смена базы без разрыва соединния

if(!$link) {
	echo mysqli_connect_errno();
	echo "<br>";
	echo mysqli_connect_error();
}

mysqli_close($link); //Закрытие соединения