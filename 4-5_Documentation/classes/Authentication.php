<?php
/**
* @author John Smith <john@smith.com>
* @package WebServices
* @subpackage Authentication
* @copyright John Smith and Son
* @license http://www.johnsmith.com/copyright/license.html Not Free
*/
/**
* Authentication handles user account info and login actions
*
* This is an abstract class that serves as a blueprint
* for classes implementing authentication using
* different account validation schemes.
*
* @see AuthAccounts
* @author John Smith <john@smith.com>
* @package WebServices
* @subpackage Authentication
* @version 0.2
* @since r3
*/
abstract class Authentication implements IAccount{
	const AUTHENTICATION_ERR_MSG = 'Произошла ошибка или время Вашего сеанса закончилось. Попробуйте выполнит вход ещё раз.';
	/**
	* Reference to Account object of currently
	* logged in user.
	*
	* @access private
	* @var Account
	*/
	private $account = null;
	/**
	* Returns account object if valid.
	*
	* @see Account::getAccount()
	* @access public
	* @param string $user user account login
	* @return Account user account
	*/
	public function getAccount($user = ''){
		if ($this->account !== null) {
			return $this->account;
		} else {
			return AUTHENTICATION_ERR_MSG;
		}
	}
	/**
	* isLoggedIn method
	*
	* Says whether the current user has provided
	* valid login credentials.
	*
	* @see Account::isLoggedIn()
	* @access public
	* @return boolean
	*/
	public function isLoggedIn(){
      // FIXME: Что-то пофиксили
      return ($this->account !== null);
	}
	/**
	* login method
	*
	* Abstract method that must be implemented when
	* sub-classing this class.
	*
	* @access public
	* @return boolean
	*/
	abstract public function login($user, $password);
}