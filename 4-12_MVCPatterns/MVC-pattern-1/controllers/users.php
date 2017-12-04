<?php

namespace App;

class Users {
    public $users;
    public $data;

    public function index() {

        $data['users'] = \User::getAllUsers();
        $data['title'] = 'Hello All Users';

        $view = new \core\View();
        $view->render('users/users', $data);
    }

    public function create() {
        $view = new \core\View();
        $view->render('users/create', $data);
    }

    public function store() {
        $name = $_POST['name'];
        $user = new \User();
        $user->name = $name;
        $user->save();
        echo "User ".$name." saved";
//        \User::store($name);
    }

    public function find() {
        $view = new \core\View();
        $view->render('users/find', $data);
    }

    public function findUser() {
        $name = $_POST['name'];
        echo  \User::findUser($name);

    }

    public function test() {
        echo __METHOD__;
    }
}