<?php


$arr= [1, [2, [3]],[4]];
// $rit = new RecursiveArrayIterator($arr);
// $rii = new RecursiveIteratorIterator($rit);

$rii = new RecursiveIteratorIterator(new RecursiveArrayIterator($arr));

foreach($rii as $key=> $value){
$depth= $rii->getDepth();

echo "depth=$depth key=$key value=$value\n";
}


/***Example 2***/

$menu = [
          'Homepage',
          'Register',
          'About' => [
                      'The Team',
                      'Our Story'
                    ],
          'Contact' => [
                        'Locations',
                        'Support'
                      ]
        ];

// Наследуем RecursiveIteratorIterator
class MyMenu extends RecursiveIteratorIterator{
  public function beginChildren(){
    echo "<ul>\n";
  }
  public function endChildren(){
    echo "</ul></li>\n";
  }
}

// Рекурсивная итерация
$rit = new MyMenu(new RecursiveArrayIterator($menu));
echo "<ul>\n";
foreach($rit as $key => $value) {
  if ($rit->hasChildren()) {
    echo "<li>$key\n";
    continue;
  }
  echo "<li>$value</li>\n";
}
echo "</ul>\n";