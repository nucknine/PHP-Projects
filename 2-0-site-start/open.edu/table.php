<?php if($_SERVER['REQUEST_METHOD'] == 'POST'){
	$cols = abs((int) $_POST['cols']);
	$rows = abs((int) $_POST['rows']);
	$color = trim(strip_tags($_POST['color']));
	}
	$cols = ($cols) ? $cols : 10;
	$rows = ($rows) ? $rows : 10;
	$color = ($color) ? $color : 'yellow';
?>


<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title><?=$title?></title>
</head>
<body>
<div class="container">
<h1><?=$title?></h1>
<h2><?=$header?></h2>
<form action="<?=$_SERVER['REQUEST_URI']?>" method="POST">
	<input name="cols" type="text">
	<input name="rows" type="text">
	<input name="color" type="text">
	<input type="submit">
</form>
<?drawTable($cols, $rows, $color)?>
</div>
</body>
</html>