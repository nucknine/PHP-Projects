<?php
header("Cache-Control: no-cache, max-age=0");
session_start();

require "soapCB.class.php";

$CB = new CBClient;
// $CB->getCurs('USD');

$codes = $CB->getCodes();
$dt = substr($CB->dt, 0, 10);
$msg="Введите тескт с картинки";

require "curseByActualDate.php";
require "curseGraph.php";
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
	<div class="form-box">
	<h3><?=$msg?></h3>
<!-- capcha -->
	<div class="capcha">
	<?
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
<!-- Form curse by actual date -->
	<div class="form">
	<form action="<?=$_SERVER['PHP_SELF']?>" method="POST">
		<select class="input" size="1" name="valuta1">
		<?php
		foreach ($codes as $code) {
			echo '<option value="'.$code.'">'.$code.'</option>';
		}
		?>
	   	</select>
		<input class="input" name="capcha" type="text" placeholder="введите текст с картинки">
		<input class="input" name="submit" type="submit" value="узнать курс на сегодня">
	</form>
		<p class="info">
		<?php
		if($msg == "Форма отправлена!" && !empty($curs))
		print "курс $valuta по отношению к рублю на <i>$dt</i> <b>$curs руб</b>";
		?>
		</p>
	</div>

<!-- Form and Graph by several dates -->
	<div class="form-graph">
		<form action="<?=$_SERVER['PHP_SELF']?>" method="POST">
			<label>Выберите валюту
			<select class="input" size="1" name="valuta2">
			<?php
			foreach ($codes as $code) {
				if($code == $_POST['valuta2'])
					echo '<option selected value="'.$code.'">'.$code.'</option>';
			echo '<option value="'.$code.'">'.$code.'</option>';
			}
			?>
	   		</select>
	   		</label>
			<label>Выберите дату от
			<input id="dateFrom" value="<?=$_POST['dateFrom']?>" class="input" type="date" name="dateFrom">
			</label>
			<label>Выберите дату до
			<input id="dateBy" class="input" type="date" value="<?=$_POST['dateBy']?>" name="dateBy">
			</label>
			<input class="input" name="capcha" type="text" placeholder="введите текст с картинки">
			<input class="input" name="submit" type="submit" value="построить график">
		</form>
	</div>
	</div>
	<div class="graph-box">
		<img class="graph" src="graph-picture.php">
	</div>
</div>
</body>
</html>