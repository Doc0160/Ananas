<?php

$req = $data['database']->prepare('SELECT id, name FROM activity');
$req->execute();
$activities = $req->fetchAll();

$req = $data['database']->prepare('SELECT * FROM photo ORDER BY id DESC');
$req->execute();
$photos = $req->fetchAll();

$req = $data['database']->prepare('SELECT COUNT(DISTINCT id_photo) FROM photo_like ORDER BY id DESC');
$req->execute();


$data["view"]->display('photos.php',
                       [
                           'photos' => $photos,
                           'activities' => $activities,
                           'can_delete' => $data['session']->has_data() &&
                                         BitField::has($data['session']->permissions,
                                                       PERMISSION_DELETE_PHOTO),
                       ]);

?>
