<?php

if(
    isset($_POST['pass1']) &&
    isset($_POST['pass2']) &&
    $_POST['pass1'] == $_POST['pass2']
) {
    
    $pass = hash("sha256", $_POST['pass1'], false);
    $name = $_POST['first_name']." ".$_POST['last_name'];
    $groupe = DEFAULT_USER_GROUP;
    $email = filter_input(INPUT_POST, 'email', FILTER_SANITIZE_EMAIL);
    
    $req = $data["database"]->prepare("INSERT INTO user (username, name, pass, email, id_groupe) VALUES (:username, :name, :pass, :mail, :groupe)");

    $req->bindParam(":username", $_POST['username']);
    $req->bindParam(":name", $name);
    $req->bindParam(":pass", $pass);
    $req->bindParam(":mail", $email);
    $req->bindParam(":groupe", $groupe);
    $req->execute();
    
    Router::redirect("/");
    //var_dump($_POST);
} else {
    Router::redirect("/inscription/");
    $data["cookie"]->error = "Mot de passe invalide.";
}


//Router::redirect("/");
?>
