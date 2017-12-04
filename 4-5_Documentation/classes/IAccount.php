<?php
/**
* @author John Smith <john@smith.com>
* @package WebServices
* @subpackage Authentication
* @copyright John Smith and Son
* @license http://www.johnsmith.com/copyright/license.html Not Free
*/
/**
* IAccount interface for authentication
*
* Any class that handles user authentication <b>must</b>
* implement this interface. It makes it almost
* trivial to check whether a user is currently
* logged in or not.
*
* @package WebServices
* @subpackage Authentication
* @author John Smith <john@smith.com>
* @version 0.1
* @since r12
*/
interface IAccount{
	/**
	* Did the current user log in?
	*
	* This method simply answers the question
	* "Did the current user log in?"
	*
	* @access public
	* @return bool
	*/
	public function isLoggedIn();
	/**
	* Returns user account info
	*
	* This method is used to retrieve the account corresponding
	* to a given login. Note: it is not required that
	* the user be currently logged in.
	*
	* @access public
	* @param string $user user name of the account
	* @return Account
	*/
	public function getAccount($user = '');
}
