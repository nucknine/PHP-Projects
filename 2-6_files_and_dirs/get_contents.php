<?
$file = file_get_contents("https://nucknine.github.io/demo1/index.html");
// print_r($file);

$f = fopen("https://nucknine.github.io/demo1/index.html", "r");
$lines = [];
while ( $line = fgetss($f, 4096) ){
	$lines[]= $line;
}
fclose($f);
foreach ($lines as $key) {
	echo "$key ";
}
?>