<?php

if (!empty($_POST['email']) && !empty($_POST['pass']))
{
	$email = filter_input(INPUT_POST, 'email', FILTER_SANITIZE_EMAIL);
	$pass = hash("sha256", $_POST['pass'], false);

	$records = $database->prepare('SELECT * FROM user WHERE email = :email AND pass = :pass');
	$records->bindParam(':email', $email, PDO::PARAM_STR);
	$records->bindParam(':pass', $pass, PDO::PARAM_STR);
	$records->execute();
	$results = $records->fetch();

	if(!empty($results))
	{
		$session->email = $results["email"];
		$session->username = $results["username"];
		$session->id = $results["id"];
		Router::redirect("/");
	}
	else
	{
		Router::redirect("/connexion/");
		setcookie("error","E-Mail ou mot de passe invalide.",time()+60*60);
	}
}
else
{
	Router::redirect("/connexion/");
	setcookie("error","Tous les champs doivent être remplis.",time()+60*60);
}


?>
