<?php

$dir = opendir(".");
// Читаем содержимое директории
while ( $name = readdir($dir) ){
if(is_dir($name))
echo '[' . $name . ']'."\n";
else
echo $name . " : ".filesize($name)." bytes\n";
}
//Выходим из директории
closedir($dir);

?>