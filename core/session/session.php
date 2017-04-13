<?php

class Session {
    public function __construct() {
        $this->start();
    }
    
    public function __get(string $name) {
        return (isset($_SESSION[$name])) ? $_SESSION[$name] : null;
    }

    public function  __set(string $name, string $value) {
        $_SESSION[$name] = $value;
    }

    public function __unset(string $name) {
        unset($_SESSION[$name]);
    }
    
    public function __isset(string $name): bool {
        return isset($_SESSION[$name]);
    }

    public function has_data(): bool {
        return !empty($_SESSION);
    }
    
    public function set_error(string $error) {
        if(isset($_SESSION['__error__'])) {
            throw new Exception("Last error wasn't treated: ".$_SESSION['error']);
        }
        $_SESSION['__error__'] = $error;
    }

    public function get_error(): string {
        $error = $_SESSION['__error__'];
        unset($_SESSION['__error__']);
        return $error;
    }

    public function has_error(): bool {
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
