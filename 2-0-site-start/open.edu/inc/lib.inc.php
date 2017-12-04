<?
//Отрисовка меню навигации
function drawMenu ($menu, $vertical=true) {
	if(!is_array($menu)) return false;
	$style="";
echo "<ul>\n";
	if(!$vertical) $style = " style='display:inline-block; margin-right:25px;'";

		foreach ($menu as $val) {
			echo "<li$style><a href='$val[href]' id='$val[id]'>$val[link]</a></li>\n";
		}

echo '</ul>';
return true;
}

//Таблица умножения
function drawTable ($cols=10, $rows=10, $bcolor="lightpink") {
	if (!is_int($cols) || !is_int($rows) || !is_string($bcolor))
			return false;

	static $cnt=0;
	$cnt++;
	echo "Table has written $cnt times";
	echo "<table>\n";
	for ($i=1; $i<=$cols; $i++) {
		echo "\t<tr>\n";
		for ($j=1; $j<=$rows; $j++) {
			$p=$i*$j;
			if ($i===$j) {
				echo "\t\t<td style=\"background:$bcolor;\">$p</td>\n";
				continue;
			}
			echo "\t\t<td>$p</td>\n";
		}
		echo "\t</tr>\n";
	}
	echo "</table>";
	return true;
}

// Приветствие
$welcome="";
$hour = (int)strftime('%H');
if($hour >= 0 && $hour < 6):
	$welcome="Good night";
 elseif ($hour >= 6 && $hour < 12):
	$welcome = "Good morning";
 elseif ($hour >= 12 && $hour < 18):
	$welcome = "Good afternoon";
 elseif ($hour >= 18 && $hour < 23):
 	$welcome = "Good evening";
 else:
	$welcome = "Good night";
endif;

?>