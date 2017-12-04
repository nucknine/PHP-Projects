<?
/***Lab4 Day4 PHP4 page 96 1:10:00***/
class Favorites{
  public $plugins = [];

  function __construct(){

  	/***Example RecursiveDirectoryIterator ***/
  	/***************************/
  	/*
	$rdi = new RecursiveDirectoryIterator('./');
	$rii = new RecursiveIteratorIterator($rdi);
	array_map(function($obj){
		if(!$obj->isDir() && $obj->getFileName() !== 'Favorites.class.php') {
			$this->plugins[] = substr_replace($obj->getPathName(), "", 0, 1);
		}
		}
	, iterator_to_array($rii));
	*/

  	/***************************/

  	/***Example with glob ***/
  	/***************************/
    $isExists = false;
  	foreach (glob('classes/*/*.class.php') as $key) {
      if(is_file($key)) {
        include_once($key);
        $isExists = true;
      }
  	}

  	/***************************/

  	/***Example with opendir and glob***/
  	/***************************/
  	/*
	chdir('classes');
    if ($dh = opendir('.')) {
        	foreach (glob('IPlugin.class.php') as $key) {
  				$this->plugins[] = $key;
  			}
        while (($file = readdir($dh)) !== false) {
        	//ищем все директории в текущей папке
            if(filetype($file) == 'dir' && $file !== '.' && $file !== '..') {
            	//открываем директорию
            	if ($pd = opendir($file)) {
            		foreach (glob("$file/*.php") as $key) {
  						$this->plugins[] = $key;
  						}
            		}
            	closedir($pd);
            	}
            }
        closedir($dh);
    }
	*/
  	/***************************/

  	/***Example with opendir ***/
  	/***************************/
  	/*
    if ($dh = opendir('.')) {
        while (($file = readdir($dh)) !== false) {
        	//ищем все директории в текущей папке
            if(filetype($file) == 'dir' && $file !== '.' && $file !== '..' && $file !== 'Favorites.class.php') {
            	//открываем директорию
            	if ($pd = opendir($file)) {
            		clearstatcache();
            		while (false !== $pfile = readdir($pd)) {
            			if($pfile!== '.' && $pfile !== '..') {
            				echo is_file($pfile);
            				$this->plugins[] = $pfile;

            			}
            		}
            	}
            	closedir($pd);
            }
        }
        closedir($dh);
    }
	*/
  	/***************************/

    if($isExists) $this->findPlugins();
}

  private function findPlugins() {
  	foreach (get_declared_classes() as $class) {
  		$rc = new ReflectionClass($class);
  		if($rc->implementsInterface('IPlugin')){
  			$this->plugins[] = $rc;
  		}
  	}
  }

  function getFavorites($methodName) {
    $items = [];
    $list = [];
    foreach ($this->plugins as $rc):
    	$rm = $rc->getMethod('getName');
    	$list[] = $rm->invoke(null);

    	if($rc->hasMethod($methodName)):
    		$rm = $rc->getMethod($methodName);
    		if($rm->isStatic()) {
    			$items[] = $rm->invoke(null);
    		} else {
    			$instance = $rc->newInstance();
				  $items[] = $rm->invoke($instance);
				}
        $list[] = $items;
    	endif;
    endforeach;
    return $list;
  }


  function getList($arr) {
    if(!is_array($arr)) return false;

      foreach ($arr as $key => $vals):
        if(!is_array($vals) && is_array($arr[$key+1])) {
          echo "<p>$vals</p>";
        } else {
          if(is_array($vals)) {
            foreach ($vals as $val):
                foreach ($val as $v):
                echo "<li><a href='http://{$v[1]}''>{$v[0]}</a></li>";
                endforeach;
            endforeach;
          }
        }
      endforeach;
  }
}