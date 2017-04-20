<?php

$records = $data["database"]->prepare('SELECT * FROM activity_suggestion WHERE visible=1 ORDER BY id DESC');
$records->execute();
$results = $records->fetchAll();

$dump = $data["database"]->prepare('SELECT COUNT(*) as nb FROM activity_vote WHERE id_user=:idu AND id_activity=:ida');
$idu = $data['session']->id;
$dump->bindParam(':idu', $idu);
foreach($results as $k => $v) {
    $ida = $v['id'];
    $dump->bindParam(':ida', $ida);
    $dump->execute();
    $dump_results = $dump->fetch();
    $results[$k]['you_vote'] = $dump_results['nb'];
}

$data["view"]->display('activities_suggestion.php',
                       [
                           "activity_suggestion" => $results,
                       ]);

?>
