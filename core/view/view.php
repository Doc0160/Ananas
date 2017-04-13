<?php

class View{

    public function __construct(ViewLoader $viewLoader) {
        $this->viewLoader = $viewLoader;
    }

    public function display(string $viewName) {
        /*echo */$this->viewLoader->load($viewName);
    }
}
