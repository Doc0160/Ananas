<?php

class Router{

    private $routes = [];
    private $notFound;
    private $path;

    public function __construct(string $path){
        $this->path = $path;
        $this->notFound = function($url){
            echo "404 - $url was not found!";
        };
    }

    public function __set(string $url, callable $action){
        $this->addWithMethod("_", $url, $action);
    }
    
    public function add(string $url, callable $action){
        $this->addWithMethod("_", $url, $action);
    }

    public function get(string $url, callable $action){
        $this->addWithMethod("GET", $url, $action);
    }

    public function post(string $url, callable $action){
        $this->addWithMethod("POST", $url, $action);
    }

    public function addWithMethod(string $method, string $url, callable $action){
        if(isset($this->routes[$method][BASEURI.$url])) {
            throw new Exception("Path already exist: ".$url);
        }
        $this->routes[$method][BASEURI.$url] = $action;
    }

    public function setNotFound(callable $action){
        $this->notFound = $action;
    }
    
    public function dispatch(){
        if(isset($this->routes[$_SERVER['REQUEST_METHOD']])) {
            foreach ($this->routes[$_SERVER['REQUEST_METHOD']] as $url => $action) {
                if( $url == $_SERVER['REQUEST_URI'] ){
                    return $action();
                }
            }
        }
        foreach ($this->routes["_"] as $url => $action) {
            if( $url == $_SERVER['REQUEST_URI'] ){
                return $action();
            }
        }
        call_user_func_array($this->notFound,[$_SERVER['REQUEST_URI']]);
    }

    
    public function redirect(string $page) {
        header('Location: '.$this->path.$page);
    }

}
