<?php

require('../config.php');
require('../core/autoload/autoload.php');

$autoloader = new Autoload();

spl_autoload_register([$autoloader, 'load']);

$autoloader->register('viewloader', function(){
    return require(BASEPATH.'/core/view/viewLoader.php');
});
$autoloader->register('cookie', function(){
    return require(BASEPATH.'/core/session/Cookie.php');
});

header('Content-Type: text/html; charset=utf-8');

$session = new Session();
$database = Database::getInstance();
$cookie = new Cookie();

$view = new View(BASEPATH.'/views/', [
    'session' => $session,
]);
$router = new Router(BASEURI);
$router->setNotFound(function($url) use ($view){
    $view->display('404.php');
});
$controller = new Controller(BASEPATH.'/controllers/', [
    'view' => $view,
    'session' => $session,
    'router' => $router,
]);

function do_header() {
    $controller->execute('header.php', [
        "database" => $database,
    ]);
}

$router->add('/', function() use ($view, $controller, $session, $database){
    do_header();
    $perm = (isset($session->permissions) ? $session->permissions : DEFAULT_PERMISSION_UNKNOWN);
    if(BitField::has($perm, PERMISSION_READ_PHOTO)) {
        $controller->execute("carousel.php", [
            "database" => $database,
        ]);
    }
    $controller->execute("news.php", [
            "database" => $database,
        ]);
    $view->display('footer.php');
});

$router->post('/connexion/', function() use ($controller, $session, $database, $cookie){
    $controller->execute("login.php", [
        "database" => $database,
        "cookie" => $cookie,
    ]);
});

$router->get('/connexion/', function() use ($view){
    $controller->execute('header.php');
    $view->display('connexion.php', ["type" => "connexion"]);
    $view->display('footer.php');
});

$router->post('/inscription/', function() use ($controller, $database, $cookie){
    $controller->execute("inscription.php", [
        "database" => $database,
    ]);
});

$router->get('/inscription/', function() use ($view){
    $controller->execute('header.php');
    $view->display('connexion.php', ["type" => "inscription"]);
    $view->display('footer.php');
});

$router->add('/deconnexion/', function() use ($view, $session){
    $session->destroy();
    $controller->execute('header.php');
    $view->display('deco.php');
    $view->display('footer.php');
});

$router->get('/photos/', function() use ($view, $controller){
    $controller->execute('header.php');
    $controller->execute('photo.php', [
        
    ]);
    $view->display('footer.php');
});

$router->post('/photos/', function() use ($router, $database, $session) {
    $router->redirect("/");
});

require("../routes/profile.php");

$router->dispatch();

