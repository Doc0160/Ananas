<?php

class Cookie {
    public function __construct() {
        //$this->start();
    }
    
    public function __get(string $name) {
        return (isset($_COOKIE[$name])) ? $_COOKIE[$name] : null;
    }

    public function __set(string $name, string $value) {
        setcookie($name, $value, time()+60*60);
    }

    public function __unset(string $name) {
        setcookie($name, '', time()-1);
    }
    
    public function __isset(string $name): bool {
        return isset($_COOKIE[$name]);
    }

    public function start() {
        /*if(!isset($_SESSION)){
            session_name("ananas");
            session_start();
        }*/
    }

    public function destroy() {
        /*if(isset($_SESSION)){
            $_SESSION = [];
            session_destroy();
        }*/
    }
}
