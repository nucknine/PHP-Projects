<?php
  header( "Content-Type: text/html;charset=utf-8");
  const FILE_NAME = 'news.xml';
  const RSS_URL = 'http://news.kodeks.ru/feed/747416538';
  const RSS_TTL = 3;

  function download($url, $filename) {
  $file = file_get_contents($url);
  $file = htmlspecialchars_decode($file);
  if($file) file_put_contents($filename, $file);
}

if(!is_file(FILE_NAME) || (time() > filemtime(FILE_NAME) + RSS_TTL)) download(RSS_URL, FILE_NAME);

  $xsml = simplexml_load_file(FILE_NAME);

?>
<html>

<head>
  <title>Каталог</title>
  <style type="text/css" media="screen">
    .desc {
      display: none;
    }
    .visible {
      display: block;
    }
  </style>
</head>

<body>
  <h3><?=$xsml->channel->description?></h3>
  <?php
    $i=1;
    foreach($xsml->channel->item as $item) {
      echo
          '<div style="border: 1px solid gray; margin: 20px;">
            <span style="cursor: pointer; padding: 20px;" onclick="document.getElementById(\'desc'.$i.'\').classList.toggle(\'visible\');">'.$item->title.'</span>
            <div class="desc" id="desc'.$i.'">
            <p>'.$item->description.'</p>
            <p>'.$item->pubDate.'</p>
            </div>
          </div>';
         $i++;
         if($i>10) break;
        }
    ?>
  </table>
</body>

</html>