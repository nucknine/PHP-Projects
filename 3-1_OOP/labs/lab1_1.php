<?
class User {
	public $name;
	public $login;
	public $password;

	function showInfo(){
		echo 'Name: '.$this->name."\n";
		echo 'login: '.$this->login."\n";
		echo 'password: '.$this->password."\n";
	}
}

$user1 = new User;
$user2 = new User;
$user3 = new User;

$user1 -> name = 'Sub zero';
$user1 -> login = 'Sub1k';
$user1 -> password = '1234';

$user2 -> name = 'Kitana';
$user2 -> login = 'Kita';
$user2 -> password = '4321';

$user3 -> name = 'Sheva';
$user3 -> login = 'Sheba';
$user3 -> password = '543523423';

$user1 -> showInfo();
$user2 -> showInfo();
$user3 -> showInfo();

