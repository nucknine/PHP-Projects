<?php
  header( "Content-Type: text/html;charset=utf-8");
  $xsml = simplexml_load_file("catalog.xml");
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
    $i=0;
    while($xsml->book[$i]) {
      echo
          '<tr>
            <td>'.$xsml->book[$i]->author.'</td>
            <td>'.$xsml->book[$i]->title.'</td>
            <td>'.$xsml->book[$i]->pubyear.'</td>
            <td>'.$xsml->book[$i]->price.'</td>
          </tr>';
          $i++;
        }
    ?>
  </table>
</body>

</html>