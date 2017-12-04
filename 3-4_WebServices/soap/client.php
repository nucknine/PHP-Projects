<?php
// Отключение кеширования wsdl-документа
ini_set('soap.wsdl_cache_enabled',0);
ini_set('soap.wsdl_cache_ttl',0);
try {
  // Создание SOAP-клиента
  $client = new SoapClient("stock.wsdl");

  // Посылка SOAP-запроса c получением результат
  $result = $client->getStock("5");
  echo "Текущий запас на складе: ", $result;
} catch (SoapFault $exception) {
  echo $exception->getMessage();
}
?>