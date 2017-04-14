<?php

$req = $data["database"]->prepare('SELECT * FROM user WHERE id=:id');
$id = $data["session"]->id;
$req->bindParam(":id", $id);
$req->execute();
$user = $req->fetch();

$data['view']->display('profile.php', $user);

var_dump($data["session"]);
var_dump($data);

?>
