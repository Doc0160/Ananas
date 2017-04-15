<?php

$req = $data['database']->prepare('SELECT *, UNIX_TIMESTAMP(date) as timestamp FROM activity WHERE UNIX_TIMESTAMP(date) > UNIX_TIMESTAMP(CURRENT_TIMESTAMP) AND visible = 1 AND activity.date IS NOT NULL LIMIT 100');
$req->execute();
$activities = $req->fetchAll();
$req = $data['database']->prepare('SELECT * FROM activity_inscription WHERE id_activity=:ida AND id_user=:idu');
$idu = $data['session']->id;
$req->bindParam(':idu', $idu);
foreach($activities as $k => $v) {
    $ida = $v['id'];
    $req->bindParam(':ida', $ida);
    $req->execute();
    $activities[$k]['inscrit'] = count($req->fetchALL()) > 0;
}
$data['view']->display('activities.php', ['activities' => $activities]);

?>
