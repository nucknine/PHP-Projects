<?php
$gi = new GlobIterator(__DIR__ .'/*.php');
$recursiveFiles = new CallbackFilterIterator($gi, 
      function($current, $key, $it) {
        return preg_match('/[5-8]/i', $current);
});
foreach($recursiveFiles as $name) {
  echo "{$name->getFileName()}\n";
}