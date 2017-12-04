<?php
/*Iterator vs Generator comparison*/

/* Итератор для чтения данных из файла */
class FileIterator implements Iterator {
  private $f;
  private $data;
  private $key;

  public function __construct($file) {
    $this->f = fopen($file, 'r');
    if (!$this->f) throw new Exception();
  }
  public function __destruct() {
    fclose($this->f);
  }
  public function current() {
    return $this->data;
  }
  public function key() {
    return $this->key;
  }
  public function next() {
    $this->data = fgets($this->f);
    $this->key++;
  }
  public function rewind() {
    fseek($this->f, 0);
    $this->data = fgets($this->f);
    $this->key = 0;
  }
  public function valid() {
    return false !== $this->data;
  }
}

foreach (new FileIterator('data.txt') as $line)
  echo "$line\n";


/* Чтение данных из файла с помощью генератора! */
function getLines($file) {
	$f = fopen($file, 'r');
	if (!$f) throw new Exception();
		while ($line = fgets($f)) {
			yield $line;
	}
	fclose($f);
}
foreach(getLines('data.txt') as $line)
  echo "$line\n";
