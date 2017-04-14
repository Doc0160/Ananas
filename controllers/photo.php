<?php

$req = $data['database']->prepare('SELECT * FROM photo');
$req->execute();
$photos = $req->fetchAll();

$data["view"]->display('photos.php', ['photos' => $photos]);

?>
