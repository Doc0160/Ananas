<?php

$req = $data['database']->prepare('SELECT * FROM groupe');
$req->execute();
$groups = $req->fetchAll();

$data['view']->display('group.php',
                       [
                           'groups' => $groups,
                           'permissions' => [
                               'PERMISSION_READ_ACTIVITY' =>
                                   PERMISSION_READ_ACTIVITY,
                               'PERMISSION_CREATE_ACTIVITY' =>
                                   PERMISSION_CREATE_ACTIVITY,
                               'PERMISSION_MODIFY_ACTIVITY' =>
                                   PERMISSION_MODIFY_ACTIVITY,
                               'PERMISSION_DELETE_ACTIVITY' =>
                                   PERMISSION_DELETE_ACTIVITY,
                               'PERMISSION_PARTICIPATE_ACTIVITY' =>
                                   PERMISSION_PARTICIPATE_ACTIVITY,

                               'PERMISSION_READ_PHOTO' =>
                                   PERMISSION_READ_PHOTO,
                               'PERMISSION_CREATE_PHOTO' =>
                                   PERMISSION_CREATE_PHOTO,
                               'PERMISSION_MODIFY_PHOTO' =>
                                   PERMISSION_MODIFY_PHOTO,
                               'PERMISSION_DELETE_PHOTO' =>
                                   PERMISSION_DELETE_PHOTO,
                               'PERMISSION_LIKE_PHOTO' =>
                                   PERMISSION_LIKE_PHOTO,
                               'PERMISSION_COMMENT_PHOTO' =>
                                   PERMISSION_COMMENT_PHOTO,

                               'PERMISSION_READ_GROUPE' =>
                                   PERMISSION_READ_GROUPE,
                               'PERMISSION_CREATE_GROUPE' =>
                                   PERMISSION_CREATE_GROUPE,
                               'PERMISSION_MODIFY_GROUPE' =>
                                   PERMISSION_MODIFY_GROUPE,
                               'PERMISSION_DELETE_GROUPE' =>
                                   PERMISSION_DELETE_GROUPE,

                               'PERMISSION_READ_GOODIES' =>
                                   PERMISSION_READ_GOODIES,
                               'PERMISSION_CREATE_GOODIES' =>
                                   PERMISSION_CREATE_GOODIES,
                               'PERMISSION_MODIFY_GOODIES' =>
                                   PERMISSION_MODIFY_GOODIES,
                               'PERMISSION_DELETE_GOODIES' =>
                                   PERMISSION_DELETE_GOODIES,
                               'PERMISSION_BUY_GOODIES' =>
                                   PERMISSION_BUY_GOODIES,
                           ]
                       ]);

?>
