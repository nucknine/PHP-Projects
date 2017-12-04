<?php
require "_header.php";
$curl = curl_init();
curl_setopt($curl, CURLOPT_URL, HOST_NAME . "test.txt");
curl_setopt($curl, CURLOPT_RETURNTRANSFER, 1);
curl_exec ($curl);

var_dump(curl_getinfo($curl));

curl_close ($curl);

