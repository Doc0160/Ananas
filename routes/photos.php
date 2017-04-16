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

if($session->has_data()) {
    if(BitField::has($perm, PERMISSION_COMMENT_PHOTO)) {
        $router->post('/photos/comment/:id/', function($id) use ($router, $database, $session){
            $id = (int)$id;
            $idu = $session->id;
            $req = $database->prepare('INSERT INTO photo_comment (id_photo, id_user, comment) VALUES (:id_photo, :id_user, :comment)');
            $req->bindParam(':id_photo', $id);
            $req->bindParam(':id_user', $idu);
            $req->bindParam(':comment', $_POST['comment']);
            $req->execute();
            $router->redirect('/photos/');
        });
    }

    if(BitField::has($perm, PERMISSION_DELETE_PHOTO)) {
        $router->get('/photos/delete/:id/', function($id) use ($router, $database){
            $id = (int)$id;
            $req = $database->prepare("SELECT picture FROM photo WHERE id=:id");
            $req->bindParam(":id", $id);
            $req->execute();
            $filename = $req->fetch()['picture'];
            var_dump($filename);
            
            $req = $database->prepare("DELETE FROM photo WHERE id=:id");
            $req->bindParam(":id", $id);
            $req->execute();

            unlink(BASEPATH.BASEIMAGE.'/'.$filename);

            $router->redirect('/photos/');
        });
    }

    if(BitField::has($perm, PERMISSION_LIKE_PHOTO)) {
        $router->get('/photos/like/:id/', function($id) use ($router, $session, $database){
            $id = (int)$id;
            $idu = $session->id;
            $req = $database->prepare("INSERT INTO photo_like (id_user, id_photo) VALUES(:id_user, :id_photo)");
            $req->bindParam(":id_photo", $id);
            $req->bindParam(":id_user", $idu);
            try {
                $req->execute();
            } catch(PDOException $e) {
                $req = $database->prepare("DELETE FROM photo_like WHERE id_user=:id_user AND id_photo=:id_photo");
                $req->bindParam(":id_photo", $id);
                $req->bindParam(":id_user", $idu);
                $req->execute();
            }

            $router->redirect('/photos/');
        });
    }

    if(BitField::has($session->permissions, PERMISSION_CREATE_PHOTO)) {
        $router->post('/photos/', function() use ($router, $session, $database) {

            $id = (int)$session->id;
            $id_activity = (int)$_POST['activity'];

            $req = $database->prepare("INSERT INTO photo (id_activity, picture) VALUES (:id_activity, :photo)");
            $photo = time().$_FILES['photo']['name'];
            $req->bindParam(":photo", $photo);
            $req->bindParam(":id_activity", $id_activity);

            if(is_uploaded_file($_FILES['photo']['tmp_name'])) {
                if(move_uploaded_file($_FILES['photo']['tmp_name'],
                                      BASEPATH.BASEIMAGE.'/'.$photo))
                {
                    $req->execute();
                    $router->redirect("/photos/");
                }
            } else {
                var_dump($_FILES);
                var_dump($_POST);
            }
        });
    }
}

?>
