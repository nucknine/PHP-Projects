<?
require_once 'classes/IPlugin.class.php';
class PluginIvana implements IPlugin{

  private static $links = [
	['Site 1', 'www.site-1.org'],
	['Site 2', 'www.site-2.org'],
	['Site 3', 'www.site-3.org']
  ];

  private $articles = [
	['Article 1', 'www.site.org/index.php?id=1'],
	['Article 2', 'www.site.org/index.php?id=2'],
	['Article 3', 'www.site.org/index.php?id=3'],
	['Article 4', 'www.site.org/index.php?id=4']
  ];

  private static $apps = [
	['App 1', 'www.site.org/app-1/'],
	['App 2', 'www.site.org/app-2/'],
	['App 3', 'www.site.org/app-3/'],
	['App 4', 'www.site.org/app-4/']
  ];

  public static function getName() { return 'Ссылки от Вани'; }

  public static function getLinksItems() {
    return self::$links;
  }

  public function getArticlesItems() {
    return $this->articles;
  }

  public static function getAppsItems() {
    return self::$apps;
  }
}
?>