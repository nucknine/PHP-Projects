<?
namespace Project\Sub;

class Connection{
  function __construct(){
    echo __CLASS__."\n";
  }
}
echo "Из PROJECT\SUB:\n";
$obj = new \Project\Sub\Connection;
?>