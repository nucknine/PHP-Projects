<?php
const FILE_NAME = 'news.xml';
const RSS_URL = 'http://php-lvl3.local/PHP_lvl3_Specialist_mywork/01_SQLite/news/rss.xml';
const RSS_TTL = 300;

$newssize = strlen(file_get_contents(FILE_NAME));
$dissize = strlen(file_get_contents(RSS_URL));

function download() {
	copy(RSS_URL, FILE_NAME);
}
if(!is_file(FILE_NAME) || ($dissize - $newssize > RSS_TTL)) download();

$xsml = simplexml_load_file(FILE_NAME);
?>
<!DOCTYPE html>

<html>
<head>
	<title>Новостная лента</title>
	<meta charset="utf-8" />
</head>
<body>

<h1>Последние новости</h1>
<?php
echo "$newssize\n";
echo "$dissize\n";

$i=0;
    while($xsml->channel->item[$i]) {
      echo
          '<div style="border: 2px solid salmon;">
            <p>'.$xsml->channel->item[$i]->title.'</p>
            <p>'.$xsml->channel->item[$i]->link.'</p>
            <p>'.$xsml->channel->item[$i]->description.'</p>
            <p>'.$xsml->channel->item[$i]->pubDate.'</p>
            <p>'.$xsml->channel->item[$i]->category.'</p>
          </div>';
          $i++;
        }

?>
</body>
</html>