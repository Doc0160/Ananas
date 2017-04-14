<?php

$req = $data['database']->prepare('SELECT id, name FROM activity');
$req->execute();
$activities = $req->fetchAll();

$req = $data['database']->prepare('SELECT * FROM photo ORDER BY photo.id DESC LIMIT 10');
$req->execute();
$photos = $req->fetchAll();

$req = $data['database']->prepare('SELECT COUNT(DISTINCT id_user) AS nb FROM photo_like WHERE id_photo=:id ORDER BY id DESC');
foreach($photos as $k => $v) {
    $req->bindParam(':id', $v['id']);
    $req->execute();
    $photos[$k]['likes'] = (int)$req->fetch()['nb'];
}

$data["view"]->display('photos.php',
                       [
                           'photos' => $photos,
                           'activities' => $activities,
                           'can_delete' => $data['session']->has_data() &&
                                         BitField::has($data['session']->permissions,
                                                       PERMISSION_DELETE_PHOTO),
                       ]);

?>
