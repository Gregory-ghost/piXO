<?php

class User {

    public function login($login, $password) {
        // get user from DB
        if ($login === 'vasya' && $password === '123') {
            $token = md5(rand() * 100000);
            return array('token' => $token);
        }
        return false;
    }
    //Написать
    public function logout() {}

    public function registration() {}
}