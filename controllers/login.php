<?php

		if (!empty($_POST['email']) && !empty($_POST['pass']))
		{
			$username = htmlspecialchars($_POST['email']);
			$pass = hash("sha256", $_POST['pass'], false);

			$records = $db->prepare('SELECT id,email,pass FROM membres WHERE email = :email AND pass = :pass');
			$records->bindParam(':email', $email, PDO::PARAM_STR);
			$records->bindParam(':pass', $pass, PDO::PARAM_STR);
			$records->execute();
			$results = $records->fetch();

			if(!empty($results))
			{
				$session->email = $results["email"];
				$session->username = $results["username"];
				$session->id = $results["id"];
			}
			else
			{
				$error_log = "E-Mail ou mot de passe invalide.";
			}
		}
		else
		{
			$error_empty = "Tous les champs doivent être remplis.";
		}
	}

?>