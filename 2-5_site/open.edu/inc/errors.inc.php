<?php
const ERR_DRAW_TABLE = "Sorry table is not available";
const ERR_DRAW_MENU = "Sorry menu is not available";

//собственный обработчик ошибок
function myErrors ($n, $msg, $file, $line) {
$dt = date("d-m-Y H:i:s");
$str = "[$dt] - $n - $msg in $file on $line\n";
switch ($n) {
	//пользовательсткие ошибки USER
		case E_USER_WARNING:
		case E_USER_NOTICE:
		case E_USER_ERROR:
		echo "<b>[$dt]</b> - $msg \n";
		echo "Webmaster has been notified\n";
	}
error_log($str, 3, "error.log"); //write in log journal error.log
}

?>