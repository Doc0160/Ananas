<?php
    $msg_form = '';
	if (!empty($_POST['activity_name']) && !empty($_POST['activity_description']))
	{
		$records = $data['database']->prepare('SELECT id FROM groupe WHERE id > 1');
		$records->execute();
		$results = $records->fetch();

		if ($data["session"]->permissions == $results) 
		{
			$data['cookie']->activity_form = "Votre suggestion à été envoyée et est en attente de validation.";
		}
		else
		{
			$data['cookie']->activity_form = "Votre suggestion sera maintenant soumis à un vote";
		}
	}

	elseif (!empty($_POST))
	{
	    $msg_form = "Tous les champs doivent être remplis.";
	}

	$data["view"]->display('new_suggestion.php', ["info_msg" => $msg_form]);
?>