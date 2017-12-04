<?
	//error_reporting(1);
	// Имя файла журнала
	define('PATH_LOG', 'log/destination.log');
	include_once "inc/log.inc.php";
	include_once "inc/gbook.inc.php";
    include_once "inc/cookie.inc.php";
	require_once "inc/data.inc.php";
	require_once "inc/errors.inc.php";
	require_once "inc/lib.inc.php";
	set_error_handler("myErrors");

	$title="Обучаем готовых к трудоустройству специалистов на теоретических и практических курсах.";
	$header="$welcome, Guest";
	$id=strtolower(trim(strip_tags($_GET['id'])));
	switch($id) {
		case 'home':
			$title="Домашняя страница";
			$header="$welcome, домашняя страница!";
			break;
		case 'calc':
			$title="Калькулятор";
			$header="$welcome, Калькулятор!";
			break;
		case 'table':
			$title="Таблица умножения";
			$header="$welcome, Таблица умножения";
			break;
		case 'contacts':
			$title="О нас";
			$header="$welcome, О нас";
			break;
		case 'log':
			$title="Журнал посещений сайта";
			$header="$welcome, Журнал посещений сайта!";
			break;
		case 'guestbook':
			$title="Гостевая книга";
			$header="$welcome, Это гостевая книга сайта!";
			break;

	}
?>
<!DOCTYPE html>
<html lang="ru">

  <head>
    <meta charset="utf-8">
    <title><?=$title?></title>
    <link rel="stylesheet" href="css/style.css">
  </head>
  <body>
    <?
    include_once "inc/header.inc.php";

    switch($id) {
    	case 'home':
			include "index.inc.php";
			break;
		case 'calc':
			include "calc.php";
			break;
		case 'contacts':
			include "contacts.php";
			break;
		case 'table':
			include "table.php";
			break;
		case 'log':
			include "inc/view-log.inc.php";
			break;
		case 'guestbook':
			include "inc/view-gbook.inc.php";
			break;
		default:
			include "index.inc.php";
	}

	require_once "inc/footer.inc.php";
	?>
		<section class="phptest">
			<div class="container">
				<?="powered by PHP {$_GET['id']} " . PHP_VERSION?>
				<?=$_SERVER['HTTP_HOST']?>
			</div>
		</section>
  </body>
</html>
