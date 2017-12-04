<?php
function generator() {
  for($i=0; $i<5; $i++) {
    yield $i;
    echo "$i\n";
    // echo (yield $i);
  }
}
foreach(generator() as $line);



/*1_2 input value*/

function gene() {
  while(true) {
    echo yield."\n";
    }
}

gene()->send('stop1');
gene()->send('start2');
gene()->send('stop3');


/*2 input and output value of variable*/

function gen() {
  $i = 0;

  while(true) {
    if((yield $i) =='stop') return;
    echo yield . "$i\n";
    $i++;
    // echo (yield $i);
  }
}
// gen()->send('stop');
$g = gen();
foreach($g as $v) {
  // $g->send('SEND');
  if ($v == 10) $g->send('stop');
  // echo "foreach $v\n";
}
