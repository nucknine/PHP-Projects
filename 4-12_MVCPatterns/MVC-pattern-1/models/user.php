<?php

class User extends \Illuminate\Database\Eloquent\Model {

    public $timestamps = false;

    public static function getAllUsers() {
        return self::all();
    }

    public static function store(){
        self::save();
    }

    public static function findUser($username){
        return self::where('name', 'like', '%'.$username.'%')->get();
    }
}
