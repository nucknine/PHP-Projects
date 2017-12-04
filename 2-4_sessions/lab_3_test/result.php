<?php
$result = 0; //Переменная для суммы ответов
if(isset($_SESSION['test'])) {
	//Зачитываем ответы из ini файла в массив
	$answers = parse_ini_file("answers.ini");
	//Проходим по полученным ответам и суммируем правильные
	foreach ($_SESSION['test'] as $value) {
		if(array_key_exists($value, $answers)) //проверка на совпадение с массивом $answers
		$result += (int)$answers[$value];
	}
	//Очищаем данные сессии
	session_destroy();
}
?>

<table width="100%">
	<tr>
		<td align="left">
			<p>
				Ваш результат: <?=$result?> из 30
			</p>
		</td>
	</tr>
</table>