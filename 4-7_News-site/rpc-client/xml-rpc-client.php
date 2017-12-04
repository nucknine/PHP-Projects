<?php
header('Content-Type: text/html;charset=utf-8');

$arr = [];
function make_request($req_xml, &$arr) {
	$options = [
		'http' => [
			'method' => 'POST',
			'header' => "User-Agent: PHPRPC/1.0\r\n".
						"Content-Type: text/xml\r\n".
						"Content-length: ".
			strlen($req_xml)."\r\n",
			'content' => "$req_xml"
		]
	];

	$context = stream_context_create($options);
	$retval = file_get_contents('http://php-lvl3.local/PHP_lvl3_Specialist_mywork/01_SQLite/news/xml-rpc-server.php', false, $context);
	$data = xmlrpc_decode($retval);

	if(is_array($data) && xmlrpc_is_fault($data)) {
		$arr[] = $data;
	} else {
		$arr[] = unserialize(base64_decode($data));
	}
}

//work
$id = 1;

$req_xml = xmlrpc_encode_request('getNewsById', $id);
make_request($req_xml, $arr);

print_r($arr);

?>