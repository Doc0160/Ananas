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

$view = new View(new ViewLoader(BASEPATH.'/views/'), [
    'session' => $session,
]);
$router = new Router();

$router->setNotFound(function($url) use ($view){
    $view->display('404.php');
});

$router->add('/',function() use ($view, $session){
	var_dump($_SESSION);
    $view->display('header.php', ["session" => $_SESSION]);
    $view->display('tralala.php', ['test' => $session->email]);
    $view->display('footer.php');
});

$router->post('/connexion/',function() use ($session, $view, $database){
    require('../controllers/login.php');
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

