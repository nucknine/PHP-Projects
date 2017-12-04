<?php
class FileModel{
  /* Имя пользователя */
  public $name = '';
  /* Список пользователей */
  public $list = [];
  /* Текущий пользователь: ассоциативный массив 
  *	с элементами role и name для существующего пользователя
  *	или только с элементом name для неизвестного пользователя
  */
  public $user = [];

  public function render($file) {
    /* $file - текущее представление */
    ob_start();
    include($file);
    return ob_get_clean();
  }
}