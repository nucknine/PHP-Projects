<?
error_reporting(0);
$link = mysqli_connect('localhost', 'root', 'Mrinnovja69L', 'web'); //Установка соединения
$sql = "SELECT * FROM teachers";

$result = mysqli_query($link, $sql); //Запрос без выборки результат true или false
$row_count = mysqli_num_rows($result);
$fields_count = mysqli_num_fields($result);
if(!$result) { //Отслеживание ошибки MySQL
	echo mysqli_errno($link);
	echo "<br>";
	echo mysqli_error($link);
}
mysqli_close($link); //Закрытие соединения

#ВАРИАНТЫ ОБРАБОТКИ

// $row1 = mysqli_fetch_array($result); //Парсинг обьекта $result в двойной массив первой строки $row
// $row2 = mysqli_fetch_array($result, MYSQLI_BOTH); //Парсинг обьекта $result в двойной массив первой строки $row
// $row3 = mysqli_fetch_array($result, MYSQLI_NUM); //Парсинг обьекта $result в индесированный массив первой строки $row
// $row4 = mysqli_fetch_array($result, MYSQLI_ASSOC); //Парсинг обьекта $result в ассоциативный массив первой строки $row
// $row5 = mysqli_fetch_row($result); //Парсинг обьекта $result в индесированный массив первой строки $row
// $row6 = mysqli_fetch_assoc($result); //Парсинг обьекта $result в ассоциативный массив первой строки $row
$row = mysqli_fetch_all($result, MYSQLI_BOTH); //Парсинг обьекта $result в массив всех строк $row

echo "rows: $row_count"; // сколько строк
echo "\n";
echo "fields: $fields_count"; // сколько полей
echo "\n";
echo "result:";
print_r($row);//Вывод массива первой строки
?>