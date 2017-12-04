<?
namespace Project;

class Connection{
  function __construct(){
    echo __CLASS__.'<br>';
  }
}
echo 'Из PROJECT:<br>';
$obj = new Connection;
?>