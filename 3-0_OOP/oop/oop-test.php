<?php

class Inner {
	function query() {
		echo "querysuccess";
	}
}


class User {
	private $db;

	public $login = "login";
	public $password = "password";

	function __get($name){

		return $this->db;
	}

	function __construct() {
		$this->db = new Inner();
	}

	function showInfo(){
		var_dump($this->db);
		echo 'login: '.$this->login."\n";
		echo 'password: '.$this->password."\n";
	}
}

class Tess extends User {
	function text() {
		$this->db->query();
	}
}

$user1 = new User;
$user = new Tess;
$user2 = new Inner;

$user->text();



