<?php
interface IPlugin{
  /**
  * Описание плагина
  */
  public static function getName();
  /**
    * 	Для вывода ссылок на сайты , опишите метод (public или public static)
    * 	Формат: array(link, href)
    *	array getMenuItems(void)
    */

  /**
    * 	Для вывода ссылок на статьи, опишите метод (public или public static)
    * 	Формат: array(название статьи, href)
    * 	array getArticlesItems(void)
    */

  /**
    * 	Для вывода ссылок на приложения, опишите метод (public или public static)
    * 	Формат: array(название приложения, href)
    * 	array getAppsItems(void)
    */
}
