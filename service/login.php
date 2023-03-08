<?php
include '../php/check.login.php';
if (isset($_POST["pseudo"]) and isset($_POST["password"])) {
    if (!empty($_POST["pseudo"]) and !empty($_POST["password"])) {
        if (isAccount($_POST["pseudo"], $_POST["password"])) {
            header('Location: 127.0.0.1/ExplorerXD');
            exit();
        } else {
            echo "<span class='error'>Mot de passe ou pseudo invalide :/</span>";
        }
    } else {
        echo "<span class='error'>Vous devez remplir tout les formulaires :/</span>";
    }
} else {
    echo "<span class='error'>Vous devez remplir tout les formulaires :/</span>";
}
?>
<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>ExplorerXD | Signin</title>
</head>
<body>
    <form action="./login.php" method="POST">
        <input type="text" name="pseudo" id="psd">
        <input type="password" name="password" id="pwd">
        <input type="password" name="password" id="pwd">
        <input type="submit" value="Valider !">
    </form>
</body>
</html>