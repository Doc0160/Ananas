<?php

    $records = $data["database"]->prepare('SELECT * FROM activity');
    $records->execute();
    $results = $records->fetchAll();

var_dump($results);
    $data["view"]->display('news.php', $results);

?>
