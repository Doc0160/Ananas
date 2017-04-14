<?php

$router->post('/inscription/', function() use ($controller, $database, $cookie){
    $controller->execute("inscription.php", [
        "database" => $database,
    ]);
});

$router->get('/inscription/', function() use ($do_header, $view){
    $do_header();
    $view->display('connexion.php', ["type" => "inscription"]);
    $view->display('footer.php');
});

?>
