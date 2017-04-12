<?php

class session {
    public function __construct(){
        $this->start();
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

    public function set_error($error) {
        if(isset($_SESSION['__error__'])) {
            throw new Exception("Last error wasn't treated: ".$_SESSION['error']);
        }
        $_SESSION['__error__'] = $error;
    }

    public function get_error() {
        $error = $_SESSION['__error__'];
        unset($_SESSION['__error__']);
        return $error;
    }

    public function has_error() {
        return isset($_SESSION['__error__']);
    }

    public function start() {
        if(!isset($_SESSION)){
            session_name("ananas");
            session_start();
        }
    }

    public function destroy() {
        if(isset($_SESSION)){
            $_SESSION = [];
            session_destroy();
        }
    }
}
