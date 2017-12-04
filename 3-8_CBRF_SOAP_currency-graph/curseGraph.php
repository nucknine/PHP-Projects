<?php
session_start();
if($_SERVER['REQUEST_METHOD'] == 'POST') {
	if(isset($_SESSION['capcha'])) {
		if($_POST['capcha'] == strtolower($_SESSION['capcha'])) {
			$msg = "Форма отправлена!";

			$valuta = $_POST['valuta2'];
			$dateFrom = $_POST['dateFrom'];
			$dateBy = $_POST['dateBy'];

			$res = $CB->getCursesByDates($dateFrom, $dateBy, $valuta);

			while(count($res) > $j) {
				$curses[] = (int) $res[$j];
				$j++;
			}
			// print_r($curses);

			$_SESSION['curses'] = base64_encode(serialize($curses));
			$_SESSION['dateFrom'] = $dateFrom;
			$_SESSION['dateBy'] = $dateBy;
			$_SESSION['valuta'] = $valuta;


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