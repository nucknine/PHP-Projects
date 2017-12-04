<?php

function Hello($name) {
	echo "Hello $name \n";
}

$f = 'Hello';
$f('Oleg');

//Аноноимная функиця - объект классы Closure
$g = function ($name) {
	echo "Hello $name \n";
};

$g('Oleg');

//Замыкание
$x=1;
$closure = function() use (&$x) {
	echo ++$x."\n";
};

$closure();
$closure();
$closure();
$closure();
echo $x."\n";

//Пример 2 перебор элементов массива

function showarr($x) {
	$i = 0;
	return function() use (&$i,$x) {
		if(isset($x[$i])) {
		echo $x[$i++]."\n";
	}
	else $i = 0;
	};
}

$arr = ['A', 'B', 'C', 'D'];
$go = showarr($arr);

$go();$go();$go();$go();$go();$go();$go();
$go();$go();$go();$go();$go();$go();$go();

