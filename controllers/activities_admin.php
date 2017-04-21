<?php

if(!empty($_POST)) {
    $req = $data['database']->prepare('INSERT INTO activity (visible, name, description, prix) VALUES (:v, :n, :d, :p)');
    $v = $_POST['visible'];
    $n = $_POST['name'];
    $d = $_POST['description'];
    $p = $_POST['price'];
    $req->bindParam(':v', $v);
    $req->bindParam(':n', $n);
    $req->bindParam(':d', $d);
    $req->bindParam(':p', $p);
    $req->execute();
    $data['router']->redirect('/activities/admin/');
    
} else {


    $req = $data['database']->prepare('SELECT *, UNIX_TIMESTAMP(date) AS timestamp FROM activity');
    $req->execute();
    $activities = $req->fetchAll();

    $data['view']->display('activities_admin.php', ['activities' => $activities]);

}
?>
