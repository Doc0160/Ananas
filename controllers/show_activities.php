<?php

$records = $data["database"]->prepare('SELECT * FROM activity DESC LIMIT 5');
$records->execute();
$results = $records->fetchAll();

$data["view"]->display('show_activities.php', $results);

?>
