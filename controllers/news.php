<?php

    $records = $data["database"]->prepare('SELECT * FROM activity WHERE UNIX_TIMESTAMP(date) > UNIX_TIMESTAMP(CURRENT_TIMESTAMP) AND visible = 1 ORDER BY id DESC LIMIT 2');
    $records->execute();
    $results = $records->fetchAll();

    $data["view"]->display('news.php', ['results' => $results]);

?>
