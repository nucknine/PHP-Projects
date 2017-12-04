<?php
$hosts = array();
getmxrr('kodeks.karelia.ru', $hosts);
var_dump($hosts);

print_r(dns_get_record('kodeks.karelia.ru'));