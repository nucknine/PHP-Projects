<?php
$id = $news->clearInt($_GET['del']);
if($id) {
	if(!$news->deleteNews($id)){
		$errMsg = 'Ошибка при удалении';
	} else {
		header('Location: news.php');
		exit;
	}
}