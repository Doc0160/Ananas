<?php

class ViewLoader{

    public function __construct(string $path) {
        $this->path = $path;
    }

    public function load(string $viewName) {
        if(file_exists($this->path.$viewName)) {
            //return file_get_contents($this->path.$viewName);
            require_once($this->path.$viewName);
            return;
        }
        throw new Exception("View does not exist: ".$this->path.$viewName);
    }
}

