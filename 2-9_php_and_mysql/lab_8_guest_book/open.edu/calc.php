<?
if($_SERVER[REQUEST_METHOD]=='POST'){
$num1=(int)$_POST['num1'];
$num2=(int)$_POST['num2'];
$op=trim(strip_tags($_POST['op']));
}
?>
<section style="
font-size: 24px;
line-height: 48px;
font-family: Arial;
">
<div class="container">
<h1><?=$title?></h1>
<h2><?=$header?></h2>
<form class="schedule" action="calc.php" method="POST">
	<fieldset><legend>Ввод значений</legend>
		<label for="num1">введите целое число</label>
		<input type="text" id="num1" name="num1"><br>
		<label for="num2">Введите целое число</label>
		<input type="text" name="num2" id="num2"><br>
		<label for="op">Введите операцию</label>
		<input type="text" name="op" id="op"><br>
	</fieldset>
	<fieldset><legend>Подтверждение</legend>
		<input type="submit" value="посчитать">
	</fieldset>
</form>
<div class="answer">
<?

switch($op){
	case '*':
	echo "$num1*$num2=",$num1*$num2.'!'; break;
	case '/':
		echo ($num2===0) ? "На ноль делить нельзя" : "$num1/$num2=",$num1/$num2.'!';
		break;
	case '-':
	echo "$num1-$num2=",$num1-$num2.'!'; break;
	case '+':
	echo "$num1+$num2=",$num1+$num2.'!'; break;
	default: echo "Неизвестная операция";
}

?>
</div>
<?php

foreach ($_POST as $key => $val) {
	echo "$key "."="." $val"."\n";
}
?>
</div>
</section>

