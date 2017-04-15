<?php

    $records = $data["database"]->prepare('SELECT * FROM activity WHERE visible = 1');
    $records->execute();
    $results = $records->fetchAll();

    $data["view"]->display('news.php', ['results' => $results]);

?>
