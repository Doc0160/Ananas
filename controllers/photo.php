<?php

$req = $data['database']->prepare('SELECT id, name FROM activity');
$req->execute();
$activities = $req->fetchAll();

$req = $data['database']->prepare('SELECT * FROM photo');
$req->execute();
$photos = $req->fetchAll();

$data["view"]->display('photos.php',
                       [
                           'photos' => $photos,
                           'activities' => $activities,
                       ]);

?>
