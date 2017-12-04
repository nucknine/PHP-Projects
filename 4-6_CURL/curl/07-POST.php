<?php
  require "_header.php";

  $curl = curl_init();
  curl_setopt($curl, CURLOPT_URL, HOST_NAME . "posttest.php");

  curl_setopt($curl, CURLOPT_POST, 1);
  curl_setopt($curl, CURLOPT_POSTFIELDS, "Hello=World&Foo=Bar&Name=Igor");

  curl_exec ($curl);
  curl_close ($curl);
