<?php

$router->get("/activities/", function()
    use($do_header, $controller, $view, $database, $session) {
        $do_header();
        $controller->execute("activities.php",
                             [
                                 'database' => $database,
                                 'session' => $session,
                             ]);
        $view->display("footer.php");
    });

if($session->has_data() &&
   Bitfield::has($session->permissions, PERMISSION_PARTICIPATE_ACTIVITY)){
    $router->get("/activities/inscription/:id/", function($id)
        use($database, $session, $router){
            $idu = (int)$session->id;
            $ida = (int)$id;
            $req = $database->prepare('INSERT INTO activity_inscription (id_activity, id_user) VALUES (:ida, :idu)');
            $req->bindParam(':ida', $ida);
            $req->bindParam(':idu', $idu);
            $req->execute();
            $router->redirect('/activities/');
        });

    $router->get("/activities/disinscription/:id/", function($id)
        use($database, $session, $router){
            $idu = (int)$session->id;
            $ida = (int)$id;
            $req = $database->prepare('DELETE FROM activity_inscription WHERE id_activity=:ida AND id_user=:idu');
            $req->bindParam(':ida', $ida);
            $req->bindParam(':idu', $idu);
            $req->execute();
            $router->redirect('/activities/');
        });
}

if($session->has_data() &&
   (Bitfield::has($session->permissions, PERMISSION_MODIFY_ACTIVITY) ||
   Bitfield::has($session->permissions, PERMISSION_DELETE_ACTIVITY))) {

    $router->get("/activities/admin/", function()
        use($do_header, $controller, $view, $database, $session) {
            $do_header();
            $controller->execute("activities_admin.php", ['database' => $database]);
            $view->display("footer.php");
        });

    if(Bitfield::has($session->permissions, PERMISSION_MODIFY_ACTIVITY)) {
        $router->post("/activities/admin/", function() use($router,$database){
            $req = $database->prepare("UPDATE activity SET visible=:visible, prix=:price, name=:name, description=:description, date=:date WHERE id=:id");
            $name = $_POST['name'];
            $id = (int)$_POST['id'];
            $description = $_POST['description'];
            $price = (float)$_POST['price'];
            $visible = (int)(bool)$_POST['visible'];
            $req->bindParam(":name", $name);
            $req->bindParam(":id", $id);
            $req->bindParam(":description", $description);
            $req->bindParam(":price", $price);
            if(strtotime($_POST['date']) < time()){
                $date = NULL;
                $req->bindParam(":date", $date);
                $visible = (int)false;
            } else {
                $date = date("Y-m-d H:i:s", strtotime($_POST['date']));
                $req->bindParam(":date", $date);
            }
            $req->bindParam(":visible", $visible);
            $req->execute();
            $router->redirect("/activities/admin/");
        });
    }

}

?>
