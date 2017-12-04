<?php
$rdi = new RecursiveDirectoryIterator('.');
$tree = new RecursiveTreeIterator($rdi);

//$tree->setPrefixPart(RecursiveTreeIterator::PREFIX_LEFT, "--");
//$tree->setPrefixPart(RecursiveTreeIterator::PREFIX_MID_HAS_NEXT, ":");
//$tree->setPrefixPart(RecursiveTreeIterator::PREFIX_END_HAS_NEXT, "[]");
//$tree->setPrefixPart(RecursiveTreeIterator::PREFIX_RIGHT, "||");

foreach ($tree as $item) {
  echo $item."\n";
}
