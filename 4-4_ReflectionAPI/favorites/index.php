<?php
  include_once 'classes/Favorites.class.php';
  $fav = new Favorites;
  $links = $fav->getFavorites('getLinksItems');
  $articles = $fav->getFavorites('getArticlesItems');
  $apps = $fav->getFavorites('getAppsItems');
?>
<!DOCTYPE html>
<html>

<head>
  <title>Наши рекомендации</title>
  <meta charset="utf-8" />
  <style>
    header {
      border-bottom: 1px solid black;
      text-align: center;
      width: 80%
    }

    div#a,
    div#b,
    div#c {
      width: 30%;
      height: 200px;
      float: left
    }
  </style>
</head>

<body>
  <header>
    <h1>Мы рекомендуем</h1>
  </header>
  <div id='a'>
    <h2>Полезные сайты</h2>
    <ul>
      <?
      $fav->getList($links);
      ?>
    </ul>
  </div>
  <div id='b'>
    <h2>Полезные приложения</h2>
    <ul>
      <?
      $fav->getList($apps);
      ?>
    </ul>
  </div>
  <div id='c'>
    <h2>Полезные статьи</h2>
    <ul>
      <?
      $fav->getList($articles);
      ?>
    </ul>
  </div>
</body>
</html>