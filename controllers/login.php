<?php

if (!empty($_POST['email']) && !empty($_POST['pass']))
{
	$email = filter_input(INPUT_POST, 'email', FILTER_SANITIZE_EMAIL);
	$pass = hash("sha256", $_POST['pass'], false);

	$records = $database->prepare('SELECT user.*, groupe.permissions FROM user JOIN groupe ON user.id_groupe = groupe.id WHERE user.email = :email AND user.pass = :pass ');
	$records->bindParam(':email', $email, PDO::PARAM_STR);
	$records->bindParam(':pass', $pass, PDO::PARAM_STR);
	$records->execute();
	$results = $records->fetch();

	if(!empty($results))
	{
		$session->email = $results["email"];
		$session->username = $results["username"];
		$session->id = $results["id"];
		$session->permissions = BitField::add($results["permissions"], DEFAULT_PERMISSION_UNKNOWN);
		Router::redirect("/");
	}
	else
	{
		Router::redirect("/connexion/");
        $cookie->error = "E-Mail ou mot de passe invalide.";
	}
}
else
{
	Router::redirect("/connexion/");
    $cookie->error = "Tous les champs doivent être remplis.";
}


?>
