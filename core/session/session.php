<?php

class session {
    public function __construct(){
        if(!isset($_SESSION)){
            session_name("ananas");
            session_start();
        }
    }
    
    public function __get ($name) {
        return $_SESSION[$name];
    }

    public function  __set ($name, $value) {
        $_SESSION[$name] = $value;
    }

    public function __unset($name) {
        unset($_SESSION[$name]);
    }
    
    public function __isset($name) {
        return isset($_SESSION[$name]);
    }
}
