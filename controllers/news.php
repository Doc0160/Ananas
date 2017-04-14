<?php

    $records = $data["database"]->prepare('SELECT * FROM activity');
    $records->execute();
    $results = $records->fetchAll();

    $data["view"]->display('news.php', $results);

?>
