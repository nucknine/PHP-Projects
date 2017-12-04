<?php


function isPalindrome($word) {
  $word = strtolower(str_replace(" ", "", $word));
  $stack = new SplStack();
  $cnt = strlen($word);
  for ($i = 0; $i < $cnt; ++$i) {
    $stack->push( $word[$i] );
  }

  $rword = "";
  while ($stack->count() > 0) {
    $rword .= $stack->pop();
  }
  return $word == $rword;
}

$word = "hello";
if (isPalindrome($word)) {
  print($word . " is a palindrome.\n");
} else {
  print($word . " is not a palindrome.\n");
}