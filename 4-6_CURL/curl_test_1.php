<?php
	// $a = strtotime('29-08-2017');
	// $b = strtotime('30-08-2017');
	// echo date("Y-m-d", $a);
	// exit;
  $curl = curl_init();
  curl_setopt($curl, CURLOPT_URL, "http://www.petrozavodsk-mo.ru/petrozavodsk_new/service/searchresult.htm");

  curl_setopt($curl, CURLOPT_POST, 1);
  // curl_setopt($curl, CURLOPT_POSTFIELDS, "startDate={$a}&endDate={$b}");
  curl_setopt($curl, CURLOPT_POSTFIELDS, "text=2424&filter=news");

  curl_exec ($curl);
  curl_close ($curl);
 print_r($_POST);
