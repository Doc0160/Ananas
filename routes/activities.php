<?php

$router->get("/activities/", function() use($do_header, $controller, $view, $database) {
    $do_header();
    $controller->execute("activities.php", ['database' => $database]);
    $view->display("footer.php");
});

?>
