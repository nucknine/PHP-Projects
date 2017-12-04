<?php
$start = memory_get_usage();

$array = range(1, 100000);

echo memory_get_usage() - $start, ' bytes';

unset($array);

echo "\n=========================\n";

$start = memory_get_usage();

$array = new SplFixedArray(100000);
for ($i = 0; $i < 100000; ++$i)
  $array[$i] = $i;

echo memory_get_usage() - $start, ' bytes';