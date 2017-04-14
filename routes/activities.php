<?php

$router->get("/activities/", function() use($do_header, $view) {
    $do_header();
    $view->display("activities.php");
    $view->display("footer.php", []);
});

?>
