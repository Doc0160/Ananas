<?php

class Controller {
    private $path;
    public function __construct(string $path) {
        $this->path = $path;
    }

    public function execute(string $name, array $data) {
        require_once($this->path.$name);
    }
}

?>
