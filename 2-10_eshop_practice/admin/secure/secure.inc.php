<?
// Часть 10. Повышение безопасности приложения

const PWD_FILE_NAME = ".htpasswd"; //файл с паролями для каждого пользователя своя строка login:hash

//функция Хэширования пароля
function shop_get_hash($password){
	$hash = password_hash($password, PASSWORD_BCRYPT);
	return $hash;
}

//функция проверки пароля (хэша)
function shop_check_hash($password, $hash) {
	// echo "$password : $hash";
	return password_verify(trim($password), trim($hash));
}

//функция создающая новую запись в файле пользователей
function shop_save_user($login, $hash) {
	$str = "$login:$hash\n";
	if(file_put_contents(PWD_FILE_NAME, $str, FILE_APPEND))
		return true;
	else
		return false;
}

//функция проверяющая наличие пользователя в списке. Если пользователь найден то функция возвращает всю строку из файла с паролями
function shop_user_exists($login){
	if(!is_file(PWD_FILE_NAME))
		return false;
	$users = file(PWD_FILE_NAME); //чтение файла в массив построчно
	foreach ($users as $user) {
		if(strpos($user, $login.':') !== false) //поиск введенного $login: в каждой строке файла с паролями
			return $user; //если пользователь найден то функция возвращает всю строку из файла!
	}
	return false;
}

function shop_logout() {
	session_destroy();
	header('Location: /PHP_lvl2_Secialist_mywork/10_eshop_practice/admin/secure/login.php');
	exit;
}