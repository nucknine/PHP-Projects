<?phpz
if ($_SERVER['REQUEST_METHOD'] == "PUT"){

  $exists = false;

  $file = basename($_SERVER['REQUEST_URI']);

  if(file_exists($file))
    $exists = true;

  $dest = fopen($file, "w");

  if (!$dest) {
    header("HTTP/1.1 409 Create error");
    exit;
  }

  $src = fopen("php://input", "r");
  while($kb = fread($src, 1024)){
    fwrite($dest, $kb, 1024);
  }
  fclose($dest);
  fclose($src);

  if($exists)
    header("HTTP/1.1 204 No Content");
  else
    header("HTTP/1.1 201 Created");
}elseif ($_SERVER['REQUEST_METHOD'] == "GET"){
  readfile(basename($_SERVER['REQUEST_URI']));
}else{
  header("HTTP/1.1 501 Not Implemented");
}
