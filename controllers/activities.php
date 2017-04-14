<?php

$req = $data['database']->prepare('SELECT * FROM activity WHERE date IS NOT NULL');
$req->execute();
$activities = $req->fetchAll();

$data['view']->display('activities.php', ['activities' => $activities]);

?>
