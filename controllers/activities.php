<?php

$req = $data['database']->prepare('SELECT * FROM activity'):
       $req->execute();
$activities = $req->fetchAll():

$data['view']->display('activities.php', ['activities' => $activities]);

?>
