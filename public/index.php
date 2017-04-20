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

$router->add('/', function()
    use ($do_header, $view, $controller, $session, $database, $cookie){
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
    $controller->execute("activities_suggestion.php", [
            "database" => $database,
        ]);
    $controller->execute("new_suggestion.php", [
            "database" => $database, 
            "cookie" => $cookie,
        ]);
    $controller->execute("shop_preview.php", [
            "database" => $database,
        ]);
    $view->display('footer.php');
});

$router->add('/legal/', function() use ($do_header, $view) {
    $do_header();
    $view->display('legal.php');
    $view->display('footer.php');
});

if($session->has_data()) {
    $router->add('/deconnexion/', function() use ($do_header, $view, $session){
        $session->destroy();
        $do_header();
        $view->display('deco.php');
        $view->display('footer.php');
    });
}

$router->add('/shop/', function() use ($do_header, $view, $database) {
    $req = $database->prepare('SELECT * FROM goodies');
    $req->execute();
    $goodies = $req->fetchAll();
    $do_header();
    $view->display('boutique.php', ['goodies' => $goodies]);
    $view->display('footer.php');
});

$router->add('/suggestion_validation/', function() use ($controller, $do_header, $view, $database) {
    $do_header();
    $controller->execute("suggestion_validation.php", [
            "database" => $database,
            "view" => $view,
        ]);
    $view->display('footer.php');
});

if($session->has_data() &&
   BitField::has($session->permissions, PERMISSION_VOTE_ACTIVITY)){

    $router->get('/activity/vote/:id/', function ($id)
        use($database, $session, $router) {
            $req = $database->prepare('INSERT INTO activity_vote (id_activity, id_user) VALUES (:ida, :idu)');
            $id = (int) $id;
            $req->bindParam(':ida', $id);
            $idu = (int)$session->id;
            $req->bindParam(':idu', $idu);
            try {
                $req->execute();
            } catch(PDOException $e) {
                $req = $database->prepare("DELETE FROM activity_vote WHERE id_user=:id_user AND id_activity=:id_activity");
                $req->bindParam(":id_activity", $id);
                $req->bindParam(":id_user", $idu);
                $req->execute();
            }
            $router->redirect('/');
        });
}

require("../routes/connexion.php");
require("../routes/inscription.php");
require("../routes/profile.php");
require("../routes/photos.php");
require("../routes/activities.php");
require('../routes/group.php');

$router->dispatch();

