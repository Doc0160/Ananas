<?php

$router->get('/photos/', function()
    use ($do_header, $session, $database, $view, $controller){
    $do_header();
    $controller->execute('photo.php', [
        'database' => $database,
        'session' => $session,
    ]);
        $view->display('footer.php');
    });

$router->post('/photos/', function() use ($router, $session, $database) {
    //$router->redirect("/");
    
    $id = (int)$session->id;
    $id_activity = (int)$_POST['activity'];

    $req = $database->prepare("INSERT INTO photo (id_activity, picture) VALUES (:id_activity, :photo)");
    $photo = time().$_FILES['photo']['name'];
    $req->bindParam(":photo", $photo);
    $req->bindParam(":id_activity", $id_activity);

    if(is_uploaded_file($_FILES['photo']['tmp_name'])) {
        if(move_uploaded_file($_FILES['photo']['tmp_name'],
                              BASEPATH.BASEIMAGE.'/'.
                              time().$_FILES['photo']['name']))
        {
            $req->execute();
            $router->redirect("/photos/");
        }
    } else {
        var_dump($_FILES);
        var_dump($_POST);
    }
});

?>
