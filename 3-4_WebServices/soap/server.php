<?php
// ini_set("soap.wsdl_cache_enabled", "0");
ini_set('soap.wsdl_cache_enabled',0);
ini_set('soap.wsdl_cache_ttl',0);
// Описание функции Web-сервиса
class Stock {
  function getStock($id) {
    $stock = array(
      "1" => 100,
      "2" => 200,
      "3" => 300,
      "4" => 400,
      "5" => 500
    );
    if (isset($stock[$id])) {
      $quantity = $stock[$id];
      return $quantity;
    } else {
      throw new SoapFault("Server", "Несуществующий id товара");
    }
  }
}

// Отключение кэширования WSDL-документа
// Создание SOAP-сервер
$server = new SoapServer("stock.wsdl");
$server->setClass("Stock");
// Добавить класс к серверу
// $server->addFunction("getStock");
// Запуск сервера
$server->handle();
?>