<?php
// Отключение кеширования wsdl-документа

ini_set('soap.wsdl_cache_enabled',0);
// ini_set('soap.wsdl_cache_ttl',0);

// $client = new SoapClient("http://php-lvl3.local/PHP_lvl3_Specialist_mywork/01_SQLite/news/soap/news.wsdl");
$client = new SoapClient("http://php-lvl3.local/PHP_lvl3_Specialist_mywork/01_SQLite/news/soap/news.wsdl");

// $param["On_date"] = "2017-03-23T12:10:00";
// $res = $client->GetCursOnDateXML($param);
// $result = $res->GetCursOnDateXMLResult->any;
// print_r($result);
try{
// Сколько новостей всего?
$result = $client->getNewsCount();
echo "<p>Всего новостей: $result</p>";
// Сколько новостей в категории Политика?
$result = $client->getNewsCountByCat(1);
echo "<p>Всего новостей в категории Политика: $result</p>";
// Покажем конкретную новость
$result = $client->getNewsById(2);
$news = unserialize(base64_decode($result));
var_dump($news);
}catch(SoapFault $e){
	echo 'Операция '.$e->faultcode.' вернула ошибку: '.$e->getMessage();
}

// $functions = $client->__getFunctions ();
// var_dump ($functions);

// $result = $client->getNewsCount();
// echo "<p>Всего новостей: $result</p>";
// $res = $client->getNewsCountByCat(434);
// echo "Result $res";
// var_dump($res);
// print_r($client->__getFunctions());
