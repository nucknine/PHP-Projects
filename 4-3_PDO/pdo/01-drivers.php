<?php
foreach(PDO::getAvailableDrivers() as $driver){
  echo $driver."\n";
}
