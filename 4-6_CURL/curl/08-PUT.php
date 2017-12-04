<?php
  require "_header.php";

  $curl = curl_init();
  curl_setopt($curl, CURLOPT_URL, HOST_NAME . "upload/put.txt");

  $str = "Hello, world!";

  $fp = tmpfile();
  fwrite($fp, $str);
  fseek($fp, 0);

  curl_setopt($curl, CURLOPT_PUT, true);
  curl_setopt($curl, CURLOPT_INFILE, $fp);
  curl_setopt($curl, CURLOPT_INFILESIZE, strlen($str));

  $result = curl_exec($curl);
  fclose($fp);
  curl_close($curl);
