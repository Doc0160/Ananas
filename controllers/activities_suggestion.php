<?php

$records = $data["database"]->prepare('SELECT * FROM activity_suggestion WHERE visible=1 ORDER BY id DESC');
$records->execute();
$results = $records->fetchAll();


$dump = $data["database"]->prepare('SELECT COUNT(DISTINCT id_user) AS nb FROM activity_vote');
$dump->execute();
$dump_results = $dump->fetchAll();

$data["view"]->display('activities_suggestion.php',
                       ["activity_suggestion" => $results,
                        "dump" => $dump_results]);

?>
