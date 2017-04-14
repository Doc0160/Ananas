<?php

$router->get("/activities/", function() use($do_header, $controller, $view) {
    $do_header();
    $controller->execute("activities.php", []);
    $view->display("footer.php");
});

?>
