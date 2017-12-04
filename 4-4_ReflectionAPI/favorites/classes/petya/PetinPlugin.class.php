<?
require_once 'classes/IPlugin.class.php';
class PetinPlugin implements IPlugin{

  private $links = [
    ['Super Puper Site 1', 'www.site-1.com'],
    ['Super Puper Site 2', 'www.site-2.com']
  ];

  private static $articles = [
	['Super Puper Article 1', 'www.site.com/index.php?id=1'],
	['Super Puper Article 2', 'www.site.com/index.php?id=2'],
	['Super Puper Article 3', 'www.site.com/index.php?id=3'],
	['Super Puper Article 4', 'www.site.com/index.php?id=4']
  ];

  public static function getName() { return 'Ссылки от Пети'; }

  public function getLinksItems() {
    return $this->links;
  }

  public static function getArticlesItems() {
    return self::$articles;
  }
}
?>