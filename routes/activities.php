<?php

$router->get("/activities/", function()
    use($do_header, $controller, $view, $database, $session) {
        $do_header();
        $controller->execute("activities.php", ['database' => $database]);
        $view->display("footer.php");
    });

if($session->has_data() &&
   (Bitfield::has($session->permissions, PERMISSION_MODIFY_ACTIVITY) ||
   Bitfield::has($session->permissions, PERMISSION_DELETE_ACTIVITY))) {

    $router->get("/activities/admin/", function()
        use($do_header, $controller, $view, $database, $session) {
            $do_header();
            $controller->execute("activities_admin.php", ['database' => $database]);
            $view->display("footer.php");
        });
    
    $router->post("/activities/admin/", function() use($database){
        $req = $database->prepare("UPDATE activity SET prix=:price, name=:name, description=:description WHERE id=:id");
        $name = $_POST['name'];
        $id = (int)$_POST['id'];
        $description = $_POST['description'];
        $price = (float)$_POST['price'];
        $req->bindParam(":name", $name);
        $req->bindParam(":id", $id);
        $req->bindParam(":description", $description);
        $req->bindParam(":price", $price);
        $req->execute();
        var_dump($_POST);
        var_dump($_FILES);
    });

}

?>
