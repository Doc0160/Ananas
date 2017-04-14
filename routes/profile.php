<?php

$router->get('/profile/', function() use ($view, $controller, $database){
    $view->display('header.php');
    $controller->execute('profile.php', [
        'database' => $database,
    ]);
    $view->display('footer.php');
});

$router->post('/profile/', function() use ($database, $session) {
    $req = $database->prepare("UPDATE user SET avatar=:photo WHERE id=:id");
    $photo = time().$_FILES['avatar']['name'];
    $id = $session->id;
    $req->bindParam(":photo", $photo);
    $req->bindParam(":id", $id);
    var_dump($_FILES);
    move_uploaded_file($_FILES['avatar']['tmp_name'],
                       BASEPATH.BASEIMAGE.'/'.time().$_FILES['avatar']['name']);
    $req->execute();
});

?>
