<?php
session_start();
$curses = unserialize(base64_decode($_SESSION['curses']));
$dateFrom = $_SESSION['dateFrom'];
$dateBy = $_SESSION['dateBy'];
$valuta = $_SESSION['valuta2'];

$i = imageCreate(700, 400);

$bcolor = imageColorAllocate($i, 80,81,79);
$dark = imageColorAllocate($i, 36,123,160);
$columncolor = imageColorAllocate($i, 242,95,92);

imageFill($i, 0, 0, $bcolor);

//axis
//y 360 (20 - 380)
imageLine($i, 20, 20, 20, 380, $dark); //1x, 1y, 2x, 2y ...
//x 660 (20 - 680)
imageLine($i, 20, 380, 680, 380, $dark); //1x, 1y, 2x, 2y ...


$max = max($curses);
$columnWidth = 0;
$x1 = 20;

for($j=1; count($curses) > $j; $j++) {

$columnHeight = (($curses[$j]/$max)*380);

$x1 += $columnWidth;
$y1 = 380;

$columnWidth = (660/count($curses));
$x2 = $x1+$columnWidth;
$y2 = 580-$columnHeight;

imageFilledRectangle($i, $x1, $y1, $x2, $y2, $columncolor);

}
// $cnt = $curses[7];
// $test = "w ".$columnWidth ." h ".$columnHeight ." cnt". $cnt;

imageString($i, 5, 20, 380, $dateFrom, $dark); //размер текста от 1 до 5. //x1 y1 координаты левого верхнего угла прямоугольника в кот вписан текст //Только ASCII символы
imageString($i, 5, 600, 380, $dateBy, $dark); //размер текста от 1 до 5. //x1 y1 координаты левого верхнего угла прямоугольника в кот вписан текст //Только ASCII символы

header("Content-type: image/png");
imagePng($i);

// /* Создание изображения */
// $i = imageCreate(500, 300);
// $i = imageCreateTrueColor(500, 300);

// /* Подготовка к работе */
// //imageAntiAlias($i, true);

// $red = imageColorAllocate($i, 255, 0, 0);
// $white = imageColorAllocate($i, 0xFF, 0xFF, 0xFF);
// $black = imageColorAllocate($i, 0, 0, 0);
// $green = imageColorAllocate($i, 0, 255, 0);
// $blue = imageColorAllocate($i, 0, 0, 255);
// $grey = imageColorAllocate($i, 192, 192, 192);

// imageFill($i, 0, 0, $grey);

// /* Рисуем примитивы */
// imageSetPixel($i, 10, 10, $black); //1x, 1y
// imageLine($i, 20, 20, 80, 280, $red); //1x, 1y, 2x, 2y ...
// imageRectangle($i, 20, 20, 80, 280, $blue);
// imageFilledRectangle($i, 20, 120, 80, 180, $blue);
// $points = array(0, 0, 100, 200, 300, 200); //1x, 1y, 2x, 2y ...
// imagePolygon($i, $points, 3, $green); // используй только первые 3 точки из массива. Больше никак
// imageEllipse($i, 200, 150, 300, 200, $red); //1x, 1y - центр элипса; 3 и 4 ширина и высота прямоугольника в который будет вписан эллипс. Если параметры равны то это круг
// imageArc($i, 200, 150, 300, 200, 0, 40, $black); //Дуга //1x, 1y - центр элипса; 3 и 4 ширина и высота прямоугольника в который будет вписан эллипс. Если параметры равны то это круг // 5, 6 - начальный и конечный градус 0 на западе 90 на юге тоесть перевернутая вниз головой система
// imageFilledArc($i, 210, 160, 300, 200, 0, 40, $red, IMG_ARC_PIE);
// imageFilledArc($i, 210, 160, 300, 200, 20, 60, $blue, IMG_ARC_CHORD);
// imageFilledArc($i, 210, 160, 300, 200, 40, 80, $green, IMG_ARC_EDGED);
// imageFilledArc($i, 210, 160, 300, 200, 60, 100, $white, IMG_ARC_NOFILL);
// //IMG_ARC_PIE - заливка от центра пирог
// //IMG_ARC_CHORD - заливка от центра до хорды
// //IMG_ARC_EDGED - заливка от центра пирог без края
// //IMG_ARC_NOFILL - заливка от центра пирог только край тоесть тоже самое, что imageARc
// imageFilledArc($i, 210, 160, 300, 200, 20, -40, $white, IMG_ARC_EDGED | IMG_ARC_NOFILL); //совместное использование
// imageFilledArc($i, 210, 160, 280, 180, 270, 310, $red, IMG_ARC_EDGED | IMG_ARC_NOFILL); //совместное использование


// /* Рисуем текст */
// imageString($i, 5, 150, 200, 'PHP5', $black); //размер текста от 1 до 5. //x1 y1 координаты левого верхнего угла прямоугольника в кот вписан текст //Только ASCII символы

// imageChar($i, 3, 150, 20, 'PHP5', $blue); //печатает 1 символ и красит его в синий цвет
// imageCharUP($i, 3, 170, 20, 'PHP5', $red); //печатает 1 символ снизу вверх и красит его в синий цвет
// imageTtfText($i, 30, 10, 300, 150, $black,'BAUHS93.TTF', 'PHP5'); //30 - размер в поинтах, 10 - угол наклона НО 90 на севере!, 300, 150 xy нижней левой точки прямоуг в котор вписывается текст. //шрифт должен быть в папке

// // Установка толщины линии
// imageSetThickness($i, 25);

// // Использование стилей
// $style = [$red, $red, $red, $black, $black, $black];
// imageSetStyle($i, $style);
// imageLine($i, 450, 0, 450, 300, IMG_COLOR_STYLED);


// /* Отдаем изображение */
// // header("Content-type: image/gif");
// // imageGif($i);
// header("Content-type: image/png");
// imagePng($i);
// //header("Content-type: image/jpg");
// //imageJpeg($i);