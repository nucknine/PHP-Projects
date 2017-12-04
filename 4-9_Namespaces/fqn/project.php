<?
namespace Project;
include 'subproject.php';

class Connection{
  function __construct(){
    echo __CLASS__."\n";
  }
}
echo "Из PROJECT:\n";
$obj = new \Project\Connection;
$obj = new \Project\Sub\Connection;
?>