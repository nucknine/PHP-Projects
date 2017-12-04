<?php
session_start();
if($_SERVER['REQUEST_METHOD'] == 'POST') {
	if(isset($_SESSION['capcha'])) {
		if($_POST['capcha'] == strtolower($_SESSION['capcha'])) {

			$msg = "Форма отправлена!";
			$valuta = $_POST['valuta1'];
			$curs = $CB->getCurs($valuta);
			// session_destroy();
		} else {
			$msg = "Введите тескт с картинки верно";
			// session_destroy();
		}
	}else {
		$msg = "Включите картинки!";
	}
}
?>