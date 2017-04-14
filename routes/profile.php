<?php

$router->get('/profile/', function() use ($view, $controller, $database){
    $view->display('header.php');
    $controller->execute('profile.php', [
        'database' => $database,
    ]);
    $view->display('footer.php');
});

$router->post('/profile/', function() {
    var_dump($_FILES);
    var_dump($_POST);
});

?>
