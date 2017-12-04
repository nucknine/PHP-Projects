<?php
/* Глобальная конфигурация cURL */
$curl = curl_init();
curl_setopt($curl, CURLOPT_RETURNTRANSFER, 1);
$host = "http://mysite.local/rest/";

/* Инициализация глобальных переменных */
$errMsg = $id = $author = $title = $summary = '';
$cmd = 'Добавить!'; // Надпись на кнопке формы

/* Исполнение методов POST (на создание) и PUT (на изменение) */
if($_SERVER['REQUEST_METHOD'] == 'POST'){
  /* Проверка заполнения полей формы */
  if(empty($_POST['author']) or empty($_POST['title']) or empty($_POST['summary'])){
    $errMsg = 'Заполните все поля!';
  }else{
    /* Формирование строки для отправки для обоих методов*/
    $str = "title={$_POST['title']}&author={$_POST['author']}&summary={$_POST['summary']}";
    curl_setopt($curl, CURLOPT_POSTFIELDS, $str);
		
    if(!empty($_POST['id'])){
      /* Отправка данных методом PUT */
      $id = abs((int)$_POST['id']);
      curl_setopt($curl, CURLOPT_URL, $host."book/$id/");
      curl_setopt($curl, CURLOPT_HTTPHEADER, ['X-HTTP-Method-Override: PUT']);
      $result = json_decode(curl_exec($curl));
      if($result->status){
        header('Location: rest.php');exit;
      }else{
        $errMsg = 'Не удалось обновить книгу';
      }
    }else{
      /* Отправка данных методом POST */
      curl_setopt($curl, CURLOPT_URL, $host.'book/');
      curl_setopt($curl, CURLOPT_POST, 1);
      $result = json_decode(curl_exec($curl));
      curl_close($curl);
      if($result->id){
        header('Location: rest.php');exit;
      }else{
        $errMsg = 'Не удалось добавить книгу';
      }
    }
  }
}else{
  /* Исполнение методов GET (на получение) и DELETE (на удаление) */
  if(isset($_GET['del'])){
    /* Отправка данных методом DELETE */
    $id = abs((int)$_GET['del']);
    if($id){
      curl_setopt($curl, CURLOPT_CUSTOMREQUEST, "DELETE");
      curl_setopt($curl, CURLOPT_URL, $host."book/$id/");
      $result = json_decode(curl_exec($curl));
      curl_close($curl);
      if($result->status){
        header('Location: rest.php');exit;
      }else{
        $errMsg = 'Не удалось удалить книгу';
      }
    }
  }elseif(isset($_GET['update'])){
    /* Отправка данных методом GET для получения одной книги */
    $id = abs((int)$_GET['update']);
    if($id){
      curl_setopt($curl, CURLOPT_URL, $host."book/$id/");
      $result = json_decode(curl_exec($curl));
      curl_close($curl);
      if($result->status){
        $errMsg = 'Не удалось получить книгу';
      }else{
        $cmd = 'Изменить!';
        $title = $result->title;
        $author = $result->author;
        $summary = $result->summary;
        $id = $result->id;
      }
    }
  }else{
    /* Отправка данных методом GET для получения всех книг */
    curl_setopt($curl, CURLOPT_URL, $host.'books/');
    $result = json_decode(curl_exec($curl));
    curl_close($curl);
  }
}
?>
<!DOCTYPE html>
<html>
<head>
  <title>Наша книжная полка</title>
  <meta charset="utf-8" />
</head>
<body>

<h1>Наша книжная полка</h1>
<?php
if($errMsg)
  echo $errMsg;
?>
<form action="<?php echo $_SERVER['PHP_SELF']; ?>" method="post">
  Название:<br />
  <input type="text" name="title" value="<?=$title?>" /><br />
  Автор:<br />
  <input type="text" name="author" value="<?=$author?>" /><br />
  Описание:<br />
  <textarea name="summary" cols="50" rows="5"><?=$summary?></textarea><br />
  <br />
  <input type="hidden" name="id" value="<?=$id?>" />
  <input type="submit" value="<?=$cmd?>" />
</form>
<?
if($id)
  exit;
?>
<h3>Всего книг в наличие: <?=count($result)?></h3>
<?php
/* Отрисовка списка книг */
foreach($result as $book){
	echo <<<BOOK
	<hr>
	<p><strong>{$book->title}</strong> by {$book->author}</p>
	<blockquote>{$book->summary}</blockquote>
	<p align="right">
		<a href="rest.php?del={$book->id}">Удалить</a>&nbsp;
		<a href="rest.php?update={$book->id}">Изменить</a>
	</p>	
BOOK;
}
?>
</body>
</html>