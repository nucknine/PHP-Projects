<?php
class Logger_1 {
	const LOG_NAME = "control.log";
	//static не сбрасывается при вызове это свойство класса и оно одно на всех// private виден только внутри класса
	//в instance хранится экземпляр самого logger'a
	static private $_instance;
	private function __construct(){}
	//clone также private так как при клонировании он вызывается. Замена construct
	private function __clone(){}
	//функция кот обращается к static свойству тоже static
	static function getInstance(){
		if(!self::$_instance)//при первом обращении instance не определена поэтому сработает if
			self::$_instance = new self; //в instace записываем экземляр класса
		return self::$_instance;		//во всех остальных случах возвращаем тот же экземляр
	}

	function log($msg){
		// self::getInstance();
		file_put_contents(self::LOG_NAME, $msg."\n", FILE_APPEND);
	}
}


//Использование
//new использвать нельзя поэтому создаем экземляр через обращение к static функции. Так как она возвращает обьект далее по цепочке вызваем log функцию
Logger_1::getInstance()->log(__LINE__);
// Logger::log(__LINE__);

//либо в переменную помещаем экземпляр и далее обращаемся к ней
$log = Logger_1::getInstance();
$log->log(__LINE__);


/*****************************************************************
Второй вариант с возможностью задавать параметр
например путь и имя лог файла/ те можно поменять файл ведения лога
******************************************************************/

class Logger_2 {
	private $name = "control1.log";
	//static не сбрасывается при вызове это свойство класса и оно одно на всех// private виден только внутри класса
	//в instance хранится экземпляр самого logger'a
	static private $_instance;
	private function __construct(){}
	//clone также private так как при клонировании он вызывается. Замена construct
	private function __clone(){}
	//функция кот обращается к static свойству тоже static
	static function getInstance(){
		if(!self::$_instance)//при первом обращении instance не определена поэтому сработает if
			self::$_instance = new self; //в instace записываем экземляр класса
		return self::$_instance;		//во всех остальных случах возвращаем тот же экземляр
	}

	function setPath($path) {
		$this->name = $path;
	}

	function log($msg){
		// self::getInstance();
		file_put_contents($this->name, $msg."\n", FILE_APPEND);
	}
}

$log = Logger_2::getInstance();
$log->setPath('control2.log');
$log->log(__LINE__);