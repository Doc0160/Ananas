<?php

$router->get('/groupe/', function()
    use ($do_header, $view, $controller, $database) {
        $do_header();
        $controller->execute('group.php', [
            'database' => $database,
            'view' => $view,
        ]);
        $view->display('footer.php');
});


?>
