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
    <?php
    include "../php/check.login.php";
    if (isset($_POST["pseudo"]) and isset($_POST["password"])) {
        if (!empty($_POST["pseudo"]) and !empty($_POST["password"])) {
            $crpass = password_hash($_POST['password'], PASSWORD_BCRYPT, ['cost'=>12,]);
            if (!isAccount(htmlspecialchars($_POST["pseudo"]), $crpass)) {
                echo "<span class='error'>Mot de passe ou pseudo invalide :/</span>";
            } else {
                setcookie("pseudo", htmlspecialchars($_POST["pseudo"], time()+(60*60*24*30), '/'));
                setcookie("password", $crpass, time()+(60*60*24*30), '/');
            }
        } else {
            echo "<span class='error'>Vous devez remplir tout les formulaires :/</span>";
        }
    } else {
        echo "<span class='error'>Vous devez remplir tout les formulaires :/</span>";
    }
    ?>
    <form action="login.php" method="POST">
        <h1>Se connecter</h1>
        <input type="text" name="pseudo" id="psd" required>
        <input type="password" name="password" id="pwd" required>
        <input type="submit" value="Valider !" required>
    </form>
</body>
</html>