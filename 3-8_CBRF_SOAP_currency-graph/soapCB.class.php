<?php
// Отключение кеширования wsdl-документа
ini_set('soap.wsdl_cache_enabled',0);
ini_set('soap.wsdl_cache_ttl',0);

class CBClient {
	public $client;
	public $dt;
	public $valuta;

	function __construct() {
		$this->client = new SoapClient("https://www.cbr.ru/DailyInfoWebServ/DailyInfo.asmx?WSDL");

		$this->dt = date('c',time());
	}

	function getCodes() {
		$param["On_date"] = $this->dt;

		$res = $this->client->GetCursOnDateXML($param);
		$result = $res->GetCursOnDateXMLResult->any;

		$xml = simplexml_load_string($result);

		while(count($xml->ValuteCursOnDate) > $i) {
			if((string) $xml->ValuteCursOnDate[$i]->VchCode)
			$codes[] = (string) $xml->ValuteCursOnDate[$i]->VchCode;
			$i++;
		}
		return $codes;
	}

	function getCurs($valuta){
		$param["On_date"] = $this->dt;
		$this->valuta = $valuta;

		$res = $this->client->GetCursOnDateXML($param);
		$result = $res->GetCursOnDateXMLResult->any;

		$xml = simplexml_load_string($result);

		while(count($xml->ValuteCursOnDate) > $i) {
			if($xml->ValuteCursOnDate[$i]->VchCode == $valuta)
				$curs = $xml->ValuteCursOnDate[$i]->Vcurs;
			$i++;
		}
		return $curs;
	}


	function getCursesByDates($date1, $date2, $val) {
		$secinday = 86400; //секунд в сутках

		//даты в unix формате
		$date1 = strtotime($date1);
		$date2 = strtotime($date2);

		//промежуток между датами в секундах
		$timegap = $date2 - $date1;
		//количество дней между датами
		$days = (int)($timegap / $secinday);
		$day = 0;
		//массив для курсов валют
		$curses = [];


		for ($i = 0; $i < $days; $i++){

			$day = $date1 + $secinday*$i;
			$day = date('c', $day);
			$param["On_date"] = $day;

			//получение результата по дням
			$res = $this->client->GetCursOnDateXML($param);
			$result = $res->GetCursOnDateXMLResult->any;
			$xml = simplexml_load_string($result);
			$j = 0;
				while(count($xml->ValuteCursOnDate) > $j) {
					if($xml->ValuteCursOnDate[$j]->VchCode == $val)
						$curses[] = $xml->ValuteCursOnDate[$j]->Vcurs;
					$j++;
				}
		}

		return $curses;
	}
}