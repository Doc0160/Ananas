<?php

class View{

    private $context;
    
    public function __construct(ViewLoader $viewLoader, array $context = []) {
        $this->viewLoader = $viewLoader;
        $this->context = $context;
    }

    private function sanitize(array &$data) {
        foreach($data as $key => &$value) {
            if(is_null($value) ||
               is_callable($value)) {
                unset($value);
                
            } elseif(is_array($value)) {
                $this->sanitize($value);
                
            } elseif(is_object($value)) {
                $value = (array) $value;
                
            } elseif(is_string($value)) {
                $value = htmlentities($value);
                
            }
        }
    }

    public function display(string $viewName, array $data = [], bool $noerror = false) {
        /*echo */
        $this->sanitize($data);
        $data = array_merge($data, $this->context);
        
        if($noerror) {
            error_reporting(0);
        }
        {
            require($this->viewLoader->load($viewName));
        }
        if($noerror) {
            error_reporting(-1);
        }
    }
}
