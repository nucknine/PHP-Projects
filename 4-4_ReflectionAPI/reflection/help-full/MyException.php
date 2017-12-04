<?php
////////////////////////////////////////////////////////////////////
	/**
	*	Класс для проверки Reflection
	*/
class MyException extends Exception{

  const MY_CONST = 100;
  /** Какое-то публичное свойство pStatic */
  public static $pStatic;
  public $publicInteger = 1;
  public $publicArray = array();
  protected $protectedString = "2";
  private $privateBoolean = true;

  /**
  *	Вызываем родительский конструктор
  */
  public function __construct($message, $errorno){
    parent::__construct($message, $errorno);
  }
  /**
    Перегружаем метод __toString
  */
  public function __toString(){
    return ("Error: $this->code - $this->message");
  }
  protected function someProtectedMethod($var){}
  private function somePrivateMethod($var){}
  static public function someStaticMethod(){}
  }

