<?php
/**
* @author John Smith <john@smith.com>
* @package WebServices
* @subpackage Accounts
* @copyright John Smith and Son
* @license http://www.johnsmith.com/copyright/license.html Not Free
*/
/**
* User class
*
* This class contains a hard-coded list of user accounts
* and the corresponding passwords. This is merely a development
* stub and should be implemented with some sort of permanent
* storage and security.
*
* @package WebServices
* @subpackage Accounts
* @see Authentication
* @see AuthAccounts
* @author John Smith <john@smith.com>
* @version 0.4
* @since r14
*/
class User{
	/**
	* hard-coded user accounts
	*
	* @access private
	* @static
	* @var array $accounts user name => password mapping
	*/
  private static $accounts = ['john' => '1234', 'mike' => 'qwerty'];
	/**
	* static validate method
	*
	* Given a user name and password, this method decides
	* whether the user has a valid account and whether
	* he/she supplied the correct password.
	*
	* @see AuthAccounts::login()
	* @access public
	* @static
	* @param string $user account user name
	* @param string $password account password
	* @return boolean
	*/
  public static function validate($user, $password){
      // TODO: Что-то сделать
    return self::$accounts[$user] == $password;
  }
	/**
	* magic __call method
	*
	* This method only implements a magic validate method
	* where the second part of the method name is the user's
	* account name.
	*
	* @see AuthAccounts::login()
	* @see validate()
	* @access public
	* @method boolean validate<user>() validate<user>(string $password) validate a user
	* @staticvar array $accounts used to validate users & passwords
	*/
  public function __call($name, $arguments){
    if (preg_match("/^validate(.*)$/", $name, $matches) && count($arguments) > 0) {
      return self::validate($matches[1], $arguments[0]);
    }
  }
}
