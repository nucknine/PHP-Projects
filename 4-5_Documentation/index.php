<?php
/*
  phpdoc -d "./src" -t "./docs" --template="responsive-twig"
*/
/**
* Bootstrap file
*
* This is the form handler for the login application.
* It expects a user name and password via _POST.
*
* @author John Smith <john@smith.com>
* @package WebServices
* @subpackage Authentication
* @copyright John Smith and Son
* @license http://www.johnsmith.com/copyright/license.html Not Free
* @version 0.5
* @since r6
*/
require_once('classes/IAccount.php');
require_once('classes/Authentication.php');
require_once('classes/User.php');
require_once('classes/Authentication/AuthAccounts.php');

$auth = new AuthAccounts();
// uncomment for testing
$user = trim(strip_tags($_POST['user']));
$pass = trim(strip_tags($_POST['password']));

if (!empty($user) && !empty($password)) {
  $loginSucceeded = $auth->login($user, $password);

  if ($loginSucceeded === true) {
    echo "Поздравляем! Вы попали по адресу\n";
  } else {
    echo "Ошибка! Попробуйте ещё раз\n";
  }
}
