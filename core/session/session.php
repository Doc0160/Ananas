<?php

class Session {
    public function __construct() {
        $this->start();
    }
    
    public function __get(string $name) {
        return (isset($_SESSION[$name])) ? $_SESSION[$name] : null;
    }

    public function __set(string $name, string $value) {
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
