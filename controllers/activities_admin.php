<?php
    $req = $data['database']->prepare('SELECT *, UNIX_TIMESTAMP(date) AS timestamp FROM activity');
    $req->execute();
    $activities = $req->fetchAll();

    $data['view']->display('activities_admin.php', ['activities' => $activities]);
?>
