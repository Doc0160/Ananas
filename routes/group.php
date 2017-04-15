<?php

$router->get('/groupe/', function()
    use ($do_header, $view) {
        $do_header();

        $view->display('footer.php');
});


?>
