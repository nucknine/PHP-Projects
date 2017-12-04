<?php
  require "_header.php";

  $curl = curl_init();
  curl_setopt ($curl, CURLOPT_URL, HOST_NAME . "test.php");

  curl_setopt($curl, CURLOPT_RETURNTRANSFER, 1);

  curl_setopt($curl, CURLOPT_HEADER, 1);

  $a = curl_exec ($curl);
  curl_close ($curl);
  echo $a;
