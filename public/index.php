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

$view = new View(new ViewLoader(BASEPATH.'/views/'), [
    'session' => $session,
]);

$controller = new Controller(BASEPATH.'/controllers/');

$router = new Router();

$router->setNotFound(function($url) use ($view){
    $view->display('404.php');
});

$router->add('/', function() use ($view, $controller, $session, $database){
    $view->display('header.php');
    $perm = (isset($session->permissions) ? $session->permissions : DEFAULT_PERMISSION_UNKNOWN);
    if(BitField::has($perm, PERMISSION_READ_PHOTO))
    {
        //require('../controllers/caroussel_dl.php');
        $controller->execute("caroussel_dl.php", [
            "database" => $database,
            "view" => $view,
        ]);
    }
    //$controller->execute("caroussel_dl.php", $view, $session, $database);
    $view->display('footer.php');
});

$router->post('/connexion/', function() use ($session, $database, $cookie){
    require('../controllers/login.php');
});

$router->get('/connexion/', function() use ($view){
    $view->display('header.php');
    $view->display('connexion.php', ["type" => "connexion"]);
    $view->display('footer.php');
});

$router->post('/inscription/', function() use ($database, $cookie){
    require('../controllers/inscription.php');
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

