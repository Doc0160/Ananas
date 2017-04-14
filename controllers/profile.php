<?php

$req = $data["database"]->prepare('SELECT * FROM user');
$req->execute();
var_dump($req->fetchAll());

var_dump($data);

?>
