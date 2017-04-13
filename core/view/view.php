<?php

class View{

    public function __construct(ViewLoader $viewLoader) {
        $this->viewLoader = $viewLoader;
    }

    private function sanitize(array &$data) {
        foreach($data as $key => &$value) {
            if(is_null($value)) {
                unset($value);
                
            } elseif(is_array($value)) {
                $this->sanitize($value);
                
            } elseif(is_object($value)) {
                $value = (array) $value;
                
            } elseif(is_string($value)) {
                $value = htmlspecialchars($value);
                
            }
        }
    }

    public function display(string $viewName, array $data = [], bool $noerror = false) {
        /*echo */
        $this->sanitize($data);
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
