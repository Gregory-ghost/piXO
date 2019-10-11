<?php

require_once('user/User.php');
require_once('piXO/PiXO.php');

class Application {

    function __construct() {
        $this->user = new User();
        $this->piXO = new PiXO();
    }

    /**************/
    /* ABOUT USER */
    /**************/
    public function login($params) {
        if ($params['login'] && $params['password']) {
            return $this->user->login($params['login'], $params['password']);
        }
        return false;
    }

    /**************/
    /* ABOUT GAME */
    /**************/
    public function turn($params) {
        if ($params['id'] && $params['x'] && $params['y']) {
            return $this->piXO->turn($params['id'], $params['x'], $params['y']);
        }
        return false;
    }
}