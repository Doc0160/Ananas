<?php

$records = $data["database"]->prepare('SELECT * FROM photo ORDER BY id DESC LIMIT 4');
$records->execute();
$results = $records->fetchAll();

$data["view"]->display('carousel.php', ["images" => $results]);

?>
