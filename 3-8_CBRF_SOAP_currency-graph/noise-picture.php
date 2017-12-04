<?php
session_start();
//open picture
$img = imageCreateFromJpeg("images/noise.jpg");
// Включение сглаживания
imageAntiAlias($img, true);
$nChars = 2;
// Выбор цвета
// imageSetThickness($img, 40);
$text = substr(md5(uniqid()), 0, $nChars);
$_SESSION['capcha'] = $text;

$x = 20;
$y = 30;
$deltaX = 40;


for($i=0; $nChars > $i; $i++) {

	$size = mt_rand(16, 30);
	$angle = mt_rand(-30, 30);
	$color = imageColorAllocate($img, $size*($size/3), 0, 0);

	// $chr = ;
	imageTtfText($img, $size, $angle, $x, $y, $color,'AGENCYR.TTF', $text{$i}); //30 - размер в поинтах, 10 - угол наклона НО 90 на севере!, 300, 150 xy нижней левой точки прямоуг в котор вписывается текст. //шрифт должен быть в папке
	$x += $deltaX;
}



//Вывод избражения
header("Content-type: image/jpg");
imageJpeg($img, null, 50);