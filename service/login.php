<?php
include '../php/check.login.php';
if (isset($_POST["pseudo"]) and isset($_POST["password"])) {
    if (!empty($_POST["pseudo"]) and !empty($_POST["password"])) {
        $crpass = htmlspecialchars(password_hash($_POST['password'], PASSWORD_BCRYPT, ['cost'=>12,]));
        $db = new PDO("mysql:host=localhost;dbname=explorerxd;charset=UTF8", "root", "");
        $req = $db->prepare("SELECT * FROM user WHERE user_name = :named AND user_paswd = :paswd");
        $req->execute(array(":named" => $_POST["pseudo"], ":paswd" => $crpass));
        if ($req->rowCount() == 1) {
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
    <link rel="stylesheet" href="../css/login.style.css">
    <link rel="stylesheet" href="../css/explorerxd.css">
    <title>ExplorerXD | Signin</title>
</head>
<body>
    <form action="login.php" method="POST">
        <input type="text" name="pseudo" id="psd">
        <input type="password" name="password" id="pwd">
        <input type="submit" value="Valider !">
    </form>
</body>
</html>