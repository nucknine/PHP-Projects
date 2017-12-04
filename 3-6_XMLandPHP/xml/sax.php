<?php
  header( "Content-Type: text/html;charset=utf-8");
  // Создание парсера
  $sax = xml_parser_create("utf-8");
  // Функция обработчик начальных тегов
  function onStart($parser, $tag, $attributes) {
    if($tag != "CATALOG" and $tag != "BOOK")
      echo "<td>";
    if($tag == "BOOK")
      echo "<tr>";
  }
  // Функция обработчик закрывающих тегов
  function onEnd($parser, $tag) {
    if($tag != "CATALOG" and $tag != "BOOK")
      echo "</td>";
    if($tag == "BOOK")
      echo "</tr>";
  }
  // Функция обработчик текстового содержимого
  function onText($parser, $text) {
    echo $text;
  }
  // Назначение обработчиков начальных и конечных тегов
  xml_set_element_handler($sax, "onStart", "onEnd");
  // Назначение обработчика текстового содержимого
  xml_set_character_data_handler($sax, "onText");
?>
<html>

<head>
  <title>Каталог</title>
</head>

<body>
  <h1>Каталог книг</h1>
  <table border="1" width="100%">
    <tr>
      <th>Автор</th>
      <th>Название</th>
      <th>Год издания</th>
      <th>Цена, руб</th>
    </tr>
    <?php
      xml_parse($sax, file_get_contents("catalog.xml"));
    ?>
  </table>
</body>

</html>