<?php

	$records = $data["database"]->prepare('SELECT * FROM activity_suggestion WHERE visible=0 ORDER BY id DESC');
	$records->execute();
	$results = $records->fetchAll();

	$data['view']->display('suggestion_validation.php', ["validation" => $results]);

?>