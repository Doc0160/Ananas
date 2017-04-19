<?php
$records = $data["database"]->prepare('SELECT * FROM activity WHERE UNIX_TIMESTAMP(date) > UNIX_TIMESTAMP(CURRENT_TIMESTAMP) ORDER BY id DESC LIMIT 5');
$records->execute();
$results = $records->fetchAll();

$data["view"]->display('show_activities.php', ["activity" => $results]);

?>
