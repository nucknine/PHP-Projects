<?php
  $zip = new ZipArchive();
  $filename = "test.zip";

  if ($zip->open($filename, ZIPARCHIVE::CREATE)!==TRUE) {
    exit("cannot open $filename\n");
  }
  // Создаём в архиве файл "test-file-php-2.txt" и записываем в него строку
  $str = "#1 This is a test string added as testfilephp1.txt.\n";
  $zip->addFromString("test-file-php-1.txt", $str);

  // Создаём в архиве файл "test-file-php-2.txt" и записываем в него строку
  $str = "#2 This is a test string added as testfilephp1.txt.\n";
  $zip->addFromString("test-file-php-2.txt", $str);

  // Копируем в архив существующий файл "test.txt" и переименовываем его в "test-from-file.txt"
  $zip->addFile("test.txt","test-from-file.txt");

  $zip->close();

  echo file_get_contents($filename);
