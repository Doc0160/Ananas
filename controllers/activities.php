<?php

$req = $data['database']->prepare('SELECT activity.* FROM activity JOIN activity_inscription ON activity_inscription.id_activity=activity.id WHERE activity.date IS NOT NULL');
$req->execute();
$activities = $req->fetchAll();
var_dump($activities);
$data['view']->display('activities.php', ['activities' => $activities]);

?>
