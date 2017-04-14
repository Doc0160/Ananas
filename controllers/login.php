<?php

if (!empty($_POST['email']) && !empty($_POST['pass']))
{
	$email = filter_input(INPUT_POST, 'email', FILTER_SANITIZE_EMAIL);
	$pass = hash("sha256", $_POST['pass'], false);

	$records = $data['database']->prepare('SELECT user.*, groupe.permissions FROM user JOIN groupe ON user.id_groupe = groupe.id WHERE user.email = :email AND user.pass = :pass ');
	$records->bindParam(':email', $email, PDO::PARAM_STR);
	$records->bindParam(':pass', $pass, PDO::PARAM_STR);
	$records->execute();
	$results = $records->fetch();

	if(!empty($results))
	{
		$data['session']->email = $results["email"];
		$data["session"]->username = $results["username"];
		$data["session"]->id = $results["id"];
		$data["session"]->permissions = BitField::add($results["permissions"], DEFAULT_PERMISSION_UNKNOWN);
        $data["session"]->CSRF = CSRF::token();
        $data["session"]->avatar = $results["avatar"];
        $data["router"]->redirect("/");
	}
	else
	{
		$data["router"]->redirect("/connexion/");
        $data['cookie']->error = "E-Mail ou mot de passe invalide.";
	}
}
else
{
	$data["router"]->redirect("/connexion/");
    $data['cookie']->error = "Tous les champs doivent être remplis.";
}


?>
