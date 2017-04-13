<?php

	$records = $database->prepare('SELECT * FROM photo ORDER BY id DESC LIMIT 4');
	$records->execute();
	$results = $records->fetchAll();

	$view->display('caroussel.php', ["images" => $results]);
?>