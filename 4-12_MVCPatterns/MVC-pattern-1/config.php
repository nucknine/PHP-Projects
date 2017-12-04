<?php
require_once "vendor/autoload.php";
/**
 * connect user model
 */
require_once "models/user.php";

use Illuminate\Database\Capsule\Manager as Capsule;

$capsule = new Capsule;

$dbname = 'mvcweb';
$dbuser = 'root';
$dbpassword = '';
$dbhost = 'localhost';


$capsule->addConnection([
    'driver'    => 'mysql',
    'host'      => 'localhost',
    'database'  => 'mvcweb',
    'username'  => 'root',
    'password'  => 'Mrinnovja69L',
    'charset'   => 'utf8',
    'collation' => 'utf8_general_ci',
    'prefix'    => '',
]);

// Make this Capsule instance available globally via static methods... (optional)
$capsule->setAsGlobal();

// Setup the Eloquent ORM... (optional; unless you've used setEventDispatcher())
$capsule->bootEloquent();