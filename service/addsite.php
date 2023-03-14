<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../css/login.style.css">
    <link rel="stylesheet" href="../css/explorerxd.css">
    <title>ExplorerXD | Ajouter un site</title>
</head>
<body>
<?php
    include '../php/database.php';
    include "../php/check.login.php";
    if (isset($_COOKIE["pseudo"]) and isset($_COOKIE["password"])) {
        if (!empty($_COOKIE["pseudo"]) and !empty($_COOKIE["password"])) {
            if (!isAccount($_COOKIE["pseudo"], $_COOKIE["password"])) {
                header("Location: ../index.php");
            }
        } else {
            header("Location: ../index.php");
        }
    } else {
        header("Location: ../index.php");
    }
    if (isset($_POST['webname']) AND isset($_POST['ip']) AND isset($_POST['description'])) {
        if (!empty($_POST['webname']) AND !empty($_POST['ip']) AND !empty($_POST['description'])) {
            $req = $db->prepare("SELECT * FROM web WHERE web_name=:named OR web_ip=:ip");
            $req->execute(['named' => htmlspecialchars($_POST['webname']), 'ip' => htmlspecialchars($_POST['ip'])]);
            $result = $req->fetch();
            if ($result == false) {
                $res = $db->prepare("INSERT INTO `web`(`web_name`, `web_ip`, `web_desc`, `web_username`) VALUES ( :a , :b , :c , :x)");
                $res->execute(['a' => htmlspecialchars($_POST['webname']), 'b' => htmlspecialchars($_POST['ip']), 'c' => htmlspecialchars($_POST['description']), 'x' => $_COOKIE["pseudo"]]);
            } else {
                echo "<span class='error'>Site deja existant ! </span>";
            }
        } else {
            echo "<span class='error'>Tous les champs doivent êtres remplit </span>";
        }
    }
    ?>
    <form action="" method="POST">
        <h1>Ajouter un site</h1>
        <input type="text" name="webname" id="psd" placeholder="Nom du site">
        <input type="text" name="ip" id="ip" placeholder="Address du site">
        <textarea name="description" id="desc" cols="30" rows="10">Une description</textarea>
        <input type="submit" value="Valider !">
    </form>
</body>
</html>