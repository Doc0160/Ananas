<?php
require('../config.php');
require('../core/autoload/autoload.php');

$autoloader = new Autoload();

spl_autoload_register([$autoloader, 'load']);

$autoloader->register('viewloader', function(){
    return require(BASEPATH.'/core/view/viewLoader.php');
});

header('Content-Type: text/html; charset=utf-8');

$session = new session();

require_once("../class/singletonPDO.php");

$view = new View( new ViewLoader(BASEPATH.'/views/') );
$router = new Router();

$router->add('/',function() use ($view){
    $view->display('header.php');
    
    $view->display('footer.php');
});

$router->add('/connexion/',function() use ($view){
    $view->display('header.php');
    $view->display('connexion.php');
    $view->display('footer.php');
});

$router->add('/deconnexion/',function() use ($view){
    $view->display('header.php');
    $view->display('deconnexion.php');
    $view->display('footer.php');
});


$router->setNotFound(function($url) use ($view){
    $view->display('404.php');
});

$router->dispatch();
