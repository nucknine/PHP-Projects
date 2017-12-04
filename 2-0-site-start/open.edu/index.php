<?
	//error_reporting(1);
    include_once "inc/cookie.inc.php";
	require_once "inc/data.inc.php";
	require_once "inc/errors.inc.php";
	require_once "inc/lib.inc.php";
	set_error_handler("myErrors");

	$title="Обучаем готовых к трудоустройству специалистов на теоретических и практических курсах.";
	$header="$welcome, Guest";
	$id=strtolower(trim(strip_tags($_GET['id'])));
	switch($id) {
		case 'calc':
			$title="Калькулятор";
			$header="$welcome, Guest! Watch, man, magic calc!";
			break;
		case 'table':
			$title="Таблица умножения";
			$header="$welcome, Guest! Watch multipli table!";
			break;
		case 'contacts':
			$title="О нас";
			$header="$welcome, Guest! Read about us, man!";
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
		case 'calc':
			include "calc.php";
			break;
		case 'contacts':
			include "contacts.php";
			break;
		case 'table':
			include "table.php";
			break;
		default:
			include "index.inc.php";
	}

	require_once "inc/footer.inc.php";
	?>
		<section class="phptest">
			<div class="container">

				<?="powered by PHP {$_GET['id']} " . PHP_VERSION?>
			</div>
		</section>
  </body>
</html>
