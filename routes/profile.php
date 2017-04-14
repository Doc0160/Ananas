<?php

$router->get('/profile/', function() use ($do_header, $view, $controller, $database){
    $do_header();
    $controller->execute('profile.php', [
        'database' => $database,
    ]);
    $view->display('footer.php');
});

$router->post('/profile/', function()
    use ($do_header, $view, $router, $database, $session) {
    $id = (int)$session->id;
    $req = $database->prepare('SELECT avatar FROM user WHERE id=:id');
    $req->bindParam(':id', $id);
    $req->execute();

    $old_photo = $req->fetch()['avatar'];
    
    $req = $database->prepare("UPDATE user SET avatar=:photo WHERE id=:id");
    $photo = time().$_FILES['avatar']['name'];
    $req->bindParam(":photo", $photo);
    $req->bindParam(":id", $id);
    if(is_uploaded_file($_FILES['avatar']['tmp_name'])) {
        if(move_uploaded_file($_FILES['avatar']['tmp_name'],
                              BASEPATH.BASEAVATAR.'/'.
                              time().$_FILES['avatar']['name']))
        {
            $req->execute();
            unlink(BASEPATH.BASEAVATAR.'/'.$old_photo);
            $router->redirect("/");
        }
    } else {
        $do_header();
        ?>
    <div class="row ">
        <div class="valign-wrapper error">
            <h5 class="valign center">Vous ne pouvez pas uploader cette image.</h5>
        </div>
    </div>
        <?php
        $view->display('footer.php');
    }
});

?>
