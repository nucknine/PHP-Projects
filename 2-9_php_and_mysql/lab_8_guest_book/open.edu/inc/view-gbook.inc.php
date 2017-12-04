<?php
if($_SERVER["REQUEST_METHOD"] == "GET") {
	$tbl=$_GET["tbl"];
	$del=$_GET["del"];
	if($del > 0 && $del <= $count) {

		$link = mysqli_connect(DB_HOST, DB_LOGIN, DB_PASSWORD, DB_NAME);
		$sql = "DELETE FROM $tbl WHERE id = '$del'";
		$result = mysqli_query($link, $sql);

		mysqli_close($link);
		// header("Location:".$_SERVER["PHP_SELF"]);
	}
}
?>
<p>Всего записей в гостевой книге: <?=$count?></p>
<?php
for($i=0; $i<$count; $i++) {
	$j=$i+1;
	echo "<p>$j) {$row[$i]['name']} | email: {$row[$i]['email']} | заходил: "
	.date("H:i:s d-m-y",$row[$i]['dt'])
	."</p><p>Оставил сообщение: {$row[$i]['msg']} </p><p><a href="
	."'"
	.$_SERVER["PHP_SELF"]
	."?id=guestbook&tbl=msgs&del={$row[$i]['id']}'"
	.">Удалить запись</a></p>";
}
?>