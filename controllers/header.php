<?php
$user = [];
if($data['session']->has_data()) {
    $req = $data['database']->prepare('SELECT * FROM user WHERE id=:id');
    $id = $data['session']->id;
    $req->bindParam(':id', $id);
    $req->execute();
    $user = $req->fetch();
}

$data['view']->display('header.php', $user);

?>
