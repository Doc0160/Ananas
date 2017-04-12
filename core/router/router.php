<?php

class Router{

    private $routes = [];
    private $notFound;

    public function __construct(){
        $this->notFound = function($url){
            echo "404 - $url was not found!";
        };
    }

    public function __set($url, $action){
        $this->routes["_"][BASEURI.$url] = $action;
    }
    
    public function add($url, $action){
        $this->routes["_"][BASEURI.$url] = $action;
    }

    public function get($url, $action){
        $this->routes["GET"][BASEURI.$url] = $action;
    }

    public function post($url, $action){
        $this->routes["POST"][BASEURI.$url] = $action;
    }

    public function addWithMethod($method, $url, $action){
        $this->routes[$method][BASEURI.$url] = $action;
    }

    public function setNotFound($action){
        $this->notFound = $action;
    }

    public function redirect($page) {
        header('Location: '.BASEURI.$page);
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
}
