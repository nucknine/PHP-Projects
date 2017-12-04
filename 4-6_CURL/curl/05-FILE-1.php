<?php
  require "_header.php";

  $curl = curl_init();
  curl_setopt ($curl, CURLOPT_URL, HOST_NAME . "test.txt");

  $fp = fopen("empty.txt", "w");
  curl_setopt($curl, CURLOPT_FILE, $fp);

  curl_exec ($curl);
  curl_close ($curl);
