<?php
//<!-- Все функции используемые на сайте -->

function clear_int($int) {
	return int($int);
}

function clear_str($str) {
	return trim(strip_tags($str));
}

//функция сохраняющая новый товар в таблицу MySQL catalog и принимающая в виде аргументов название, автора, год издания и цену товара
function shop_add_item_to_catalog($title, $author, $pubyear, $price) {
	global $link;
	//Проверка на пустые значения
	if(empty($title) || empty($author) || empty($pubyear) || empty($price))
		return false;


	$sql = 'INSERT INTO catalog (title, author, pubyear, price) VALUES (?, ?, ?, ?)'; //Создаем подготовленный запрос на вставку
	if(!$stmt = mysqli_prepare($link, $sql)) //Передам серверу запрос. Если $stmt после передачи false то выход из функции и возврат false
		return false;

	mysqli_stmt_bind_param($stmt, "ssii", $title, $author, $pubyear, $price); //Передаем параметры запросу

	mysqli_stmt_execute($stmt); //Исполнение запроса

	mysqli_stmt_close($stmt);

	return true; //Возврат true после исполнения функции
}

//Функция возвращает все содержимое каталога товаров в виде ассоциативного массива
function shop_select_all_items() {
	global $link;

	$sql = 'SELECT id, title, author, pubyear, price FROM catalog'; //Создаем запрос на выборку

	if(!$result = mysqli_query($link, $sql)) //Проверка на ошибки
		return false;

	$items = mysqli_fetch_all($result, MYSQLI_ASSOC); //Передача результата ассоциативному массиву

	mysqli_free_result($result); //Освобождение памяти

	return $items; //Возврат массива после исполнения функции
}

//функция для сохранения корзины с товарами в куки
function shop_save_basket() {
	global $basket; //Используем глобальную переменную $basket из файла config
	$basket = base64_encode(serialize($basket)); //так как это массив и нам надо сохранить его в куки - выполняем сериализацию и оборачиваем в base64
	setcookie('basket', $basket, 0x7FFFFFFF);
}

//функция создает либо загружает в переменную $basket (корзину с товарами), либо создает новую корзину с идентификатором заказа
function shop_basket_init(){
	global $basket, $count; //Используем глобальные переменные $basket и $count из файла config

	if(!isset($_COOKIE['basket'])) { //Проверяем существует ли корзина?
		$basket = ['orderid' => uniqid()]; //Если нет то создаем уникальный номер заказа в массиве $basket

		shop_save_basket(); //Сохраняем массив $basket в cookie пользователя
	}
	else {
		$basket = unserialize(base64_decode($_COOKIE['basket'])); //Если корзина существует разворачиваем массив и считаем сколько там элементов минус orderid

		// $count = count($basket) - 1; //Получаем количество отдельных наименований без учета общего числа
		// $vals = array_values($basket);
		// $vals = array_shift($vals);
		foreach ($basket as $key => $val) {
			if($key != 'orderid') {
			$count += $val;
		}
		}

	}
}

//функция которая добавляет товар в корзину пользователя и принимает к качестве аргумента идентификатор товара
function shop_add_to_basket($id) {
	global $basket;
	$basket[$id] = 1;
	shop_save_basket();
}

//------Часть 6 Выборка и показ товаров из корзины пользователя-------


//Функция возвращает всю пользовательскую корзину в виде ассоциативного массива
function shop_my_basket(){
	global $link, $basket;
	//Наш массив с товарами имеет вид
	//	$basket
	//	(
 	//     'orderid' => 'x2334x33xerre',
 	//     '3' => '1',
	//     '6' => '1',
	//     '4' => '1',
	//     '2' => '1',
	//     '9' => '1',
	//   );
	$goods = array_keys($basket); //в массив $goods переносим все ключи из $basket в результате получаем массив $goods с индексами и ключами(id)
	//	$goods
	//	(
	//     [0] => orderid
	//     [1] => 3
	//     [2] => 6
	//     [3] => 4
	//     [4] => 2
	//     [5] => 9
	//	)
	array_shift($goods); //извлекает первое значение массива $goods и возвращает его, сокращая размер array на один элемент При этом первый элемент присваивается переменной, но так как у нас присваивания нет, то первый элемент не учтется и в результате мы получим новый массив $goods вида:
	//	$goods
	// (
	//     [0] => 3
	//     [1] => 6
	//     [2] => 4
	//     [3] => 2
	//     [4] => 9
	// )
	if(!$goods)
		return false; //Если $goods пустой то выход из функции и false
	$ids = implode(",", $goods); //Объединяет элементы массива в строку, разделяя каждый элемент запятой. $ids получает эту строку
	// $ids = 3,6,4,2,9
	//Теперь можно создать запрос с дипазоном этих id
	$sql = "SELECT id, title, author, pubyear, price FROM catalog WHERE id IN($ids)";
	//Делаем запрос к базе
	if(!$result = mysqli_query($link, $sql))
		return false;

	$items = shop_result_to_array($result); //Получаем ассоциативный массив товаров, дополненный их количеством
	mysqli_free_result($result);
	return $items;
}

//Функция которая принимает результат выполнения функции shop_my_basket() и возвращает ассоциативный массив товаров, дополненный их количеством
function shop_result_to_array($data) {
	global $basket;
	$arr = []; //создаем пустой массив
	while($row = mysqli_fetch_assoc($data)) { //берем первую строку результата выборки заказанных товаров, добаляем ключ quantity(количество) и присваиваем ему значение равное $basket[$id] то есть количество определенного товара добавленного в корзину.
		$row['quantity'] = $basket[$row['id']];
		$arr[] = $row; //Добавляем дополненную новым ключом строку в пустой массив и так для каждой строки
	}
	return $arr;
}

//------Часть 7 Удаление товара из корзины пользователя-------

//функция которая удаляет товар из корзины пользователя и принимает к качестве аргумента идентификатор товара
function shop_delete_from_basket($id) {
	global $basket;

	unset($basket[$id]); //удаляем из глобального массива basket элемент по имени id
	shop_save_basket(); //сохраняем корзину с товарами в куки
}


//------Часть 8 Формирование заказа-------

//функция, которая пересохраняет товары из корзины в таблицу базы данных orders и принимает в качестве аргумента дату и время заказа в виде временной метки

function shop_save_order($datetime) {
	global $link, $basket;

	$goods = shop_my_basket();

	//$stmt = mysqli_stmt_init($link);

	$sql = 'INSERT INTO orders (
		title,
		author,
		pubyear,
		price,
		quantity,
		orderid,
		datetime
		)
	VALUES (?,?,?,?,?,?,?)';

	if(!$stmt = mysqli_prepare($link, $sql)) //Передам серверу запрос. Если $stmt после передачи false то выход из функции и возврат false
		return false;
	if(is_array($goods)) {
		foreach ($goods as $item) {
		mysqli_stmt_bind_param($stmt, "ssiiisi",
								$item['title'],
								$item['author'],
								$item['pubyear'],
								$item['price'],
								$item['quantity'],
								$basket['orderid'],
								$datetime
								); //Передаем параметры запросу
		mysqli_stmt_execute($stmt); //Исполнение запроса
		}
		mysqli_stmt_close($stmt);
	} else
		return false;

	setcookie('basket', '', 1);

	return true; //Возврат true после исполнения функции

}

//------ Часть 9. Просмотр списка заказов ------
//функция для выборки всех заказов возвращает многомерный массив с информацией о всех заказах, включая персональные данные покупателя и список его товаров

function shop_get_orders() {
	global $link;

	if(!is_file(ORDERS_LOG)) {
		echo "no file";
		return false;
	}

	$orders = file(ORDERS_LOG); //Получаем в виде массива персональные данные пользователей из файла каждая строка файла это элемент массива - то есть один заказ

	// Массив, который будет возвращен функцией
	$allorders = [];

	//Для каждой строки (заказа) list() используется для того, чтобы присвоить списку переменных значения за одну операцию. explode разделяет на отдельные значения. В php7 функция list работает справа на лево.
	foreach ($orders as $order) {
		// list($name, $email, $phone, $address, $orderid, $date) = explode("|", $order);

		$list = explode("|", trim($order)); //альтернативный способ для PHP7 создаем массив $list и вместо переменных как было выше ипользуем индексы по порядку

		$orderinfo = [];// Промежуточный массив для хранения информации о конкретном заказе

		//Сохранение информации о конкретном пользователе
		// $orderinfo["name"] = mysqli_real_escape_string($link,$list[0]);
		$orderinfo["name"] = $list[0];
		$orderinfo["email"] = $list[1];
		$orderinfo["phone"] = $list[2];
		$orderinfo["address"] = $list[3];
		$orderinfo["orderid"] = $list[4];
		$orderinfo["date"] = $list[5];

		//SQL-запрос на выборку из таблицы orders всех товаров для конкретного покупателя

		$date = $list[3];
		$orderid = $list[4];
		$sql = "SELECT title, author, pubyear, price, quantity FROM orders WHERE orderid = '$orderid'";
		//AND datetime = '$date'
		// $sql = "SELECT title FROM orders WHERE id = '$orderinfo[\'orderid\'] AND datetime = '$orderinfo[\'date\']'";

		if(!$result = mysqli_query($link, $sql))
			return false;
		$items = mysqli_fetch_all($result, MYSQLI_ASSOC);
		mysqli_free_result($result);

		$orderinfo["goods"] = $items; // добавляем в наш промежуточный массив товары заказанные пользователем

		$allorders[] = $orderinfo; //перекидывваем в основной массив
	} //конец foreach

	return $allorders;
}


//----------------------------------------
//функция которая удаляет товар из каталога пользователя и принимает к качестве аргумента идентификатор товара
function shop_delete_from_catalog($id) {
	global $link;

	$sql = "DELETE from catalog WHERE id=$id";
	if(!$result = mysqli_query($link, $sql))
		return false;
}
