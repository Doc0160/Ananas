<?php

$records = $data["database"]->prepare('SELECT * FROM goodies ORDER BY RAND() DESC LIMIT 3');
$records->execute();
$results = $records->fetchAll();

$data["view"]->display('shop_preview.php', $results);

?>
