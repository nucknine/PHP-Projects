<?php
class NewsDB implements IteratorAggregate {
	const NAME_DB = 'news.db';
	const SQLITE_DB_CONNECT = 'sqlite:'.self::NAME_DB;
	const RSS_NAME = 'rss.xml';
	const RSS_TITLE = 'Последние новости';
	const RSS_LINK = 'http://php-lvl3.local/PHP_lvl3_Specialist_mywork/01_SQLite/news/news.php';
	private $_db = NULL;

	//lvl4 property for categories. Array for getIterator()
	private $_items = [];

	function __get($name) {
		if($name == '_db')
			return $this->_db;
	}

	function __construct() {
		$this->_db = new PDO(self::SQLITE_DB_CONNECT);
		$this->_db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
		if(filesize(self::NAME_DB) == 0) {
			try {
			$this->_db->beginTransaction();
			################### Таблица msgs ######################
			$sql = 'CREATE TABLE msgs(
				id INTEGER PRIMARY KEY AUTOINCREMENT,
				title TEXT,
				category INTEGER,
				description TEXT,
				source TEXT,
				datetime INTEGER
				)';
			$this->_db->exec($sql);
			#######################################################
			################### Таблица category ######################
			$sql = 'CREATE TABLE category(
					id INTEGER,
					name TEXT
					)';

			$this->_db->exec($sql);
			#######################################################
			################### Заполнение таблицы category ######################
			$sql = "INSERT INTO category(id, name)
					SELECT 1 as id, 'Политика' as name
					UNION SELECT 2 as id, 'Культура' as name
					UNION SELECT 3 as id, 'Спорт' as name";

			$this->_db->exec($sql);
			$this->_db->commit();
		######################################################################
			} catch (PDOException $e){
				$this->_db->rollBack();
				echo $e->getMessage();
				exit;
			}
		}
		$this->getCategories();
	}

	/*Lab 2.2 lvl4 ArrayIterator and IteratorAggregate*/
	private function getCategories(){
		try {
			$sql = "SELECT
			id,
			name
			FROM category";

			if(!is_object($result = $this->_db->query($sql)))
				throw new Exeption($this->_db->lastErrorMsg());

			while($row = $result->fetch(PDO::FETCH_ASSOC)){
			$this->_items[$row['id']] = $row['name'];
			}

		} catch (Exception $e) {
			//$e->getMessage;
			return false;
		}

	}

	/*Lab 2.2 lvl4 ArrayIterator and IteratorAggregate
	we getting object as array. The $news object we can place in foreach and get categories with id as keys.
	*/
	public function getIterator() {
        return new ArrayIterator($this->_items);
  	}

/**
	 *	Добавление новой записи в новостную ленту
	 *
	 *	@param string $title - заголовок новости
	 *	@param string $category - категория новости
	 *	@param string $description - текст новости
	 *	@param string $source - источник новости
	 *
	 *	@return boolean - результат успех/ошибка
	*/
	function saveNews($title, $category, $description, $source){
		try {
		$dt = time();

		$sql = "INSERT INTO msgs (
		title,
		category,
		description,
		source,
		datetime
		)
		VALUES (
		$title,
		$category,
		$description,
		$source,
		$dt
		)";

		$this->_db->exec($sql);
		$this->createRss();
		return true;
		} catch (PDOException $e) {
			return false;
			//$e->getMessage;
		}
	}

	protected function db2Arr($res) {
		$items = [];
		while($row = $res->fetch(PDO::FETCH_ASSOC)){
			$items[] = $row;
		}
		return $items;
	}

    /**
	 *	Выборка всех записей из новостной ленты
	 *	SELECT O.OrderID, C.CustomerName
		FROM Orders O
		INNER JOIN Customers C ON O.CustomerID = C.CustomerID;
	 *	@return array - результат выборки в виде массива
	*/
	function getNews() {
		try {
			$sql = "SELECT
			m.id as id,
			title,
			c.name as category,
			description,
			source,
			datetime
			FROM msgs m
			INNER JOIN category c
			ON m.category = c.id
			ORDER BY id DESC";

			if(!is_object($result = $this->_db->query($sql)))
				throw new Exeption($this->_db->lastErrorMsg());
			$items = $this->db2Arr($result);
			return $items;
		} catch (Exception $e) {
			//$e->getMessage;
			return false;
		}

	}

    /**
	 *	Удаление записи из новостной ленты
	 *
	 *	@param integer $id - идентификатор удаляемой записи
	 *
	 *	@return boolean - результат успех/ошибка
	*/
	function deleteNews($id) {
		try {
		$sql = "DELETE FROM msgs WHERE id=$id";
		$this->_db->exec($sql);
		return true;
		} catch (PDOException $e) {
			return false;
			//$e->getMessage;
		}
	}

	function createRss() {
		$dom = new DOMDocument("1.0", "utf-8");
		$dom->formatOutput = true;
		$dom->preserveWhiteSpace = false;

		$rss = $dom->createElement("rss");

		// $rss = $dom->documentElement;
		$dom->appendChild($rss);

		$version = $dom->createAttribute("version");
		$version->value = '2.0';
		$rss->appendChild($version);

		$channel = $dom->createElement("channel");
		$rss->appendChild($channel);
		$title = $dom->createElement("title", self::RSS_TITLE);
		$channel->appendChild($title);
		$link = $dom->createElement("link", self::RSS_LINK);
		$channel->appendChild($link);

		if(!$items = $this->getNews()) return false;

		foreach ($items as $arr) {
			$item = $dom->createElement("item");

			$dt = date('Y-d-m H:i:s', $arr['datetime']);

		 	$title = $dom->createElement("title");
		 	$cdata = $dom->createCDATASection($arr['title']);
		 	$title->appendChild($cdata);

		 	$link = $dom->createElement("link");
		 	$cdata = $dom->createCDATASection('http://'.$arr['source'].'.com');
		 	$link->appendChild($cdata);

		 	$description = $dom->createElement("description");
		 	$cdata = $dom->createCDATASection($arr['description']);
		 	$description->appendChild($cdata);

		 	$pubDate = $dom->createElement("pubDate");
		 	$cdata = $dom->createCDATASection($dt);
		 	$pubDate->appendChild($cdata);

		 	$category = $dom->createElement("category");
		 	$cdata = $dom->createCDATASection($arr['category']);
		 	$category->appendChild($cdata);


			$channel->appendChild($item);
			 	$item->appendChild($title);
			 	$item->appendChild($link);
			 	$item->appendChild($description);
			 	$item->appendChild($pubDate);
			 	$item->appendChild($category);
		}

		$dom->save(self::RSS_NAME);

	}

	function clearStr($str) {
		return $this->_db->quote(trim(strip_tags($str)));

	}

	function clearInt($int) {
		return abs((int) $int);

	}

	function __destructor() {
		unset($this->_db);
	}
}