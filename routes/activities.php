<?php

if($session->has_data() &&
   Bitfield::has($session->permissions, PERMISSION_MODIFY_ACTIVITY) ||
   Bitfield::has($session->permissions, PERMISSION_DELETE_ACTIVITY)) {

    $router->get("/activities/", function()
        use($do_header, $controller, $view, $database, $session) {
            $do_header();
            $controller->execute("activities.php", ['database' => $database]);
            $view->display("footer.php");
        });

    $router->get("/activities/admin/", function()
        use($do_header, $controller, $view, $database, $session) {
        $do_header();
            $controller->execute("activities_admin.php", ['database' => $database]);
        $view->display("footer.php");
    });

}

?>
