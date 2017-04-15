<?php
$user = [];
if($data['session']->has_data()) {
    $req = $data['database']->prepare('SELECT user.*, groupe.name AS groupe FROM user JOIN groupe ON groupe.id=user.id_groupe WHERE user.id=:id');
    $id = $data['session']->id;
    $req->bindParam(':id', $id);
    $req->execute();
    $user = $req->fetch();
}

$data['view']->display('header.php', $user);

?>
