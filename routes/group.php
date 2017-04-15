<?php

$router->get('/groupe/', function()
    use ($do_header, $view, $controller, $database) {
        $do_header();
        $controller->execute('group.php', [
            'database' => $database,
            'view' => $view,
        ]);
        $view->display('footer.php');
    });

$router->post('/groupe/',  function()
    use ($database, $router) {
        $id = (int)$_POST['id'];
        $perm = array_sum($_POST['perm']);
        $req = $database->prepare('UPDATE groupe SET permissions=:perm WHERE id=:id');
        $req->bindParam(':id', $id);
        $req->bindParam(':perm', $perm);
        $req->execute();
        $router->redirect('/groupe/');
});

?>
