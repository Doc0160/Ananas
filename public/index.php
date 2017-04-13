<?php
require('../config.php');
require('../core/autoload/autoload.php');

$autoloader = new Autoload();

spl_autoload_register([$autoloader, 'load']);

$autoloader->register('viewloader', function(){
    return require(BASEPATH.'/core/view/viewLoader.php');
});

header('Content-Type: text/html; charset=utf-8');

$session = new Session();
$database = Database::getInstance();

$view = new View(new ViewLoader(BASEPATH.'/views/'));
$router = new Router();

$router->setNotFound(function($url) use ($view){
    $view->display('404.php');
});

$router->add('/',function() use ($view){
    $view->display('header.php');
    $view->display('tralala.php', ['test' => "<b>ayayaya</b>"]);
    $view->display('footer.php');
});

$router->post('/connexion/',function() use ($session){
    $session->username = "bite";
    Router::redirect("/");
});

$router->get('/connexion/',function() use ($view){
    $view->display('header.php');
    $view->display('connexion.php');
    $view->display('footer.php');
});

$router->get('/inscription/',function() use ($view){
    $view->display('header.php');
    $view->display('connexion.php');
    $view->display('footer.php');
});

$router->get('/deconnexion/',function() use ($view, $session){
    $session->destroy();
    Router::redirect("/");
});

$router->dispatch();

