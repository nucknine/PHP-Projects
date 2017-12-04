<?php
$title = $news->clearStr($_POST['title']);
$category = $news->clearStr($_POST['category']);
$description = $news->clearStr($_POST['description']);
$source = $news->clearStr($_POST['source']);

if(empty($title) || empty($category)) {
	$errMsg = "Заполните все поля";
} else {
	if(!$news->saveNews($title, $category, $description, $source)) {
		$errMsg = "Ошибка при добавлении новости";
	} else {
		header('Location: news.php');
		exit;
	}
}
