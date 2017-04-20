<?php

$req = $data['database']->prepare('SELECT id, name FROM activity WHERE date IS NOT NULL');
$req->execute();
$activities = $req->fetchAll();

$req = $data['database']->prepare('SELECT photo.*, activity.name as activity FROM photo JOIN activity ON activity.id=photo.id_activity ORDER BY photo.id DESC LIMIT 10');
$req->execute();
$photos = $req->fetchAll();

$you_vote_req = $data['database']->prepare('SELECT COUNT(id_user) AS nb FROM photo_like WHERE id_photo=:id AND id_user=:id_user ORDER BY id DESC');
$you_id = $data['session']->id;
$you_vote_req->bindParam(':id_user', $you_id);

$req = $data['database']->prepare('SELECT COUNT(DISTINCT id_user) AS nb FROM photo_like WHERE id_photo=:id ORDER BY id DESC');

$comments = $data['database']->prepare('SELECT photo_comment.*, user.username, user.avatar FROM photo_comment JOIN user ON user.id=photo_comment.id_user WHERE photo_comment.id_photo=:id');

foreach($photos as $k => $v) {
    $you_vote_req->bindParam(':id', $v['id']);
    $you_vote_req->execute();
    $req->bindParam(':id', $v['id']);
    $req->execute();
    $comments->bindParam(':id', $v['id']);
    $comments->execute();
    $photos[$k]['likes'] = (int)$req->fetch()['nb'];
    $photos[$k]['you_like'] = ((int)$you_vote_req->fetch()['nb'] > 0);
    $photos[$k]['comments'] = $comments->fetchAll();
}

$data["view"]->display('photos.php',
                       [
                           'photos' => $photos,
                           'activities' => $activities,
                           'can_delete' => $data['session']->has_data() &&
                                         BitField::has($data['session']->permissions,
                                                       PERMISSION_DELETE_PHOTO),
                           'can_like' => $data['session']->has_data() &&
                                         BitField::has($data['session']->permissions,
                                                       PERMISSION_LIKE_PHOTO),
                           'can_comment' => $data['session']->has_data() &&
                                       BitField::has($data['session']->permissions,
                                                     PERMISSION_COMMENT_PHOTO),
                           'can_delete_comment' => $data['session']->has_data() &&
                                                 BitField::has($data['session']->permissions,
                                                               PERMISSION_DELETE_COMMENT),
                       ]);

?>
