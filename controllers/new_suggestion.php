<?php
    $msg_form = '';
	if (!empty($_POST['activity_name']) && !empty($_POST['activity_description']))
	{
		$name = $_POST['activity_name'];
		$description = $_POST['activity_description'];

		$req = $data["database"]->prepare("INSERT INTO activity_suggestion (name, description) VALUES (:name, :description)");

	    $req->bindParam(":name", $name);
	    $req->bindParam(":description", $description);
	    $req->execute();
    
		$msg_form = "Votre suggestion à été envoyée et est en attente de validation.";
	}

	elseif (!empty($_POST))
	{
	    $msg_form = "Tous les champs doivent être remplis.";
	}

	$data["view"]->display('new_suggestion.php', ["info_msg" => $msg_form]);
?>