<?php

require('../config.php');
require('../core/autoload/autoload.php');

$autoloader = new Autoload();

spl_autoload_register([$autoloader, 'load']);

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

$perm = (isset($session->permissions)) ? BitField::add($session->permissions, DEFAULT_PERMISSION_UNKNOWN) : DEFAULT_PERMISSION_UNKNOWN;

$do_header = function() use($controller, $database, $session) {
    $controller->execute('header.php', [
        "database" => $database,
        'session' => $session,
    ]);
};

$router->add('/', function() use ($do_header, $view, $controller, $session, $database){
    $do_header();
    $perm = (isset($session->permissions) ? $session->permissions : DEFAULT_PERMISSION_UNKNOWN);
    if(BitField::has($perm, PERMISSION_READ_PHOTO)) {
        $controller->execute("carousel.php", [
            "database" => $database,
        ]);
    }
    $controller->execute("news.php", [
            "database" => $database,
        ]);
    $controller->execute("show_activities.php", [
            "database" => $database,
        ]);
    $controller->execute("shop_preview.php", [
            "database" => $database,
        ]);
    $view->display('footer.php');
});

$router->add('/deconnexion/', function() use ($do_header, $view, $session){
    $session->destroy();
    $do_header();
    $view->display('deco.php');
    $view->display('footer.php');
});

require("../routes/connexion.php");
require("../routes/inscription.php");
require("../routes/profile.php");
require("../routes/photos.php");
require("../routes/activities.php");
require('../routes/group.php');

$router->dispatch();

