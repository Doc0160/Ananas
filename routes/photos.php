<?php

$router->get('/photos/', function() use ($do_header, $database, $view, $controller){
    $do_header();
    $controller->execute('photo.php', [
        'database' => $database,
    ]);
    $view->display('footer.php');
});

$router->post('/photos/', function() use ($router, $database, $session) {
    $router->redirect("/");
});

?>
