<?php

$router->get('/photos/', function()
    use ($do_header, $database, $view, $controller){
    $do_header();
    $controller->execute('photo.php', [
        'database' => $database,
    ]);
        $view->display('footer.php');
    });

$router->post('/photos/', function() use ($router, $session, $database) {
    //$router->redirect("/");
    
    $id = (int)$session->id;
    $id_activity = '';

    $req = $database->prepare("INSERT INTO photo (id_activity, picture) VALUES (:id_activity, :photo)");
    $photo = time().$_FILES['photo']['name'];
    $req->bindParam(":photo", $photo);
    $req->bindParam(":id_activity", $id_activity);
    
    var_dump($_FILES);
    var_dump($_POST);
});

?>
