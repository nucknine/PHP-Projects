<?
require_once 'classes/IPlugin.class.php';
class VasinPlugin implements IPlugin{

  private static $links = [
	['Super Site 1', 'www.site-1.ru'],
	['Super Site 2', 'www.site-2.ru'],
	['Super Site 3', 'www.site-3.ru'],
	['Super Site 4', 'www.site-4.ru']
  ];
  private $apps = [
    ['Super App 1', 'www.site.ru/app-1/'],
	['Super App 2', 'www.site.ru/app-2/']
  ];

  public static function getName() { return 'Ссылки от Васи'; }

  public static function getLinksItems() {
	return self::$links;
  }

  public function getAppsItems() {
    return $this->apps;
  }
}
?>