<?php

if(
    isset($_POST['pass1']) &&
    isset($_POST['pass2']) &&
    $_POST['pass1'] == $_POST['pass2']
) {
    $req = $database->prepare("INSERT INTO user (username, name, pass, email, id_group) VALUES (:username, :name, :pass, :mail, :groupe)");
    $req->bindParam(":username", $_POST['username']);
    $req->bindParam(":pass", hash("sha256", $_POST['pass1'], false));
    $req->bindParam(":email", $_POST['email']);
    $req->bindParam(":name", $_POST['first_name']." ".$_POST['last_name']);
    var_dump($_POST);
} else {
    $cookie->error = "Mot de passe invalide.";
}


//Router::redirect("/");
?>
