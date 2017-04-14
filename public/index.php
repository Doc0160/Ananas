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
$controller = new Controller(BASEPATH.'/controllers/', [
    'view' => $view,
    'session' => $session,
]);

$router = new Router();

$router->setNotFound(function($url) use ($view){
    $view->display('404.php');
});

$router->add('/', function() use ($view, $controller, $session, $database){
    $view->display('header.php');
    $perm = (isset($session->permissions) ? $session->permissions : DEFAULT_PERMISSION_UNKNOWN);
    if(BitField::has($perm, PERMISSION_READ_PHOTO))
    {
        $controller->execute("caroussel_dl.php", [
            "database" => $database,
        ]);
    }
    $view->display('footer.php');
});

$router->post('/connexion/', function() use ($controller, $session, $database, $cookie){
    $controller->execute("login.php", [
        "database" => $database,
        "cookie" => $cookie,
    ]);
});

$router->get('/connexion/', function() use ($view){
    $view->display('header.php');
    $view->display('connexion.php', ["type" => "connexion"]);
    $view->display('footer.php');
});

$router->post('/inscription/', function() use ($controller, $database, $cookie){
    $controller->execute("inscription.php", [
        "database" => $database,
    ]);
});

$router->get('/inscription/', function() use ($view){
    $view->display('header.php');
    $view->display('connexion.php', ["type" => "inscription"]);
    $view->display('footer.php');
});

$router->add('/deconnexion/', function() use ($view, $session){
    $session->destroy();
    Router::redirect("/");
});

$router->get('/photos/', function() use ($view){
    $view->display('header.php');
    $view->display('footer.php');
});

$router->post('/photos/', function() use ($database, $session){
    Router::redirect("/");
});

$router->dispatch();

