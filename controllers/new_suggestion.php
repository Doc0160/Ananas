<?php

	if (!empty($_POST['activity_name']) && !empty($_POST['activity_description']))
	{
		$records = $data['database']->prepare('SELECT id FROM groupe WHERE id > 1');
		$records->execute();
		$results = $records->fetch();

		if ($data["session"]->permissions > $value['description']) 
		{

		}
		$data['cookie']->success_activity_form = "Votre demande à été envoyée et est en attente de validation.";
	}

	else
	{
	    /*$data['cookie']->error_activity_form = "Tous les champs doivent être remplis.";*/
	}

	$data["view"]->display('new_suggestion.php');
?>
