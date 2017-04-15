<?php
if(!$session->has_data()) {
    $router->post('/connexion/', function() use ($do_header, $controller, $session, $database, $cookie){
        $controller->execute("login.php", [
            "database" => $database,
            "cookie" => $cookie,
        ]);
    });

    $router->get('/connexion/', function() use ($do_header, $view){
        $do_header();
        $view->display('connexion.php', ["type" => "connexion"]);
        $view->display('footer.php');
    });
}

?>
