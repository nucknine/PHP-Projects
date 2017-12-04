<?php
$file = new SplFileObject('data.csv');
while($array = $file->fgetcsv()) {
  var_export($array);
}
exit;

// Кастомизируем чтение csv файла
class CSVFileObject extends SPLFileInfo
                    implements Iterator, SeekableIterator {
  protected $map, $fp, $currentLine;

  public function __construct( $filename, $mode = 'r', $inc = false, $ctx = null ){
    parent::__construct($filename);
    if(isset($context)) {
      $this->fp = fopen( $filename, $mode, $inc, $ctx );
    } else {
      $this->fp = fopen($filename, $mode, $inc);
    }
    if(!$this->fp) {
      throw new Exception("Не могу прочитать файл!");
    }
    //
    $this->map = $this->fgetcsv();
    $this->currentLine = 0;
  }

  function fgetcsv($delimiter = ',', $enclosure = '"') {
    return fgetcsv($this->fp, 0, $delimiter, $enclosure);
  }

  function key() {
    return $this->currentLine;
  }
  function current() {
    $fpLoc = ftell($this->fp);
    $data = $this->fgetcsv();
    fseek($this->fp, $fpLoc);
    return array_combine($this->map, $data);
  }
  function valid() {
    // Проверяем EOF
    if(feof($this->fp)) {
      return false;
    }
    $fpLoc = ftell($this->fp);
    $data = $this->fgetcsv();
    fseek($this->fp, $fpLoc);
    return (is_array($data));
  }
  function next() {
    $this->currentLine++;
    fgets($this->fp);
  }
  function rewind() {
    $this->currentLine = 0;
    fseek($this->fp, 0);
    fgets($this->fp);
  }
  function seek($line) {
    $this->rewind();
    while($this->currentLine < $line && !$this->eof()) {
      $this->currentLine++;
      fgets($this->fp);
    }
  }
}
$it = new CSVFileObject('data.csv');
var_export(iterator_to_array($it));
