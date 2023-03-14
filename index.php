<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/index.style.css">
    <link rel="stylesheet" href="css/js.cookie.css">
    <link rel="stylesheet" href="css/explorerxd.css">
    <title>ExplorerXD</title>
</head>
<body>
    <?php
    if (!isset($_COOKIE["pseudo"]) and !isset($_COOKIE["password"])) {
        echo "<div id='cookie'><span>ExplorerXD utilise des cookies</span><a onclick='quitModal()' id='accept' class='btn'>D'accord</a></div>";
    }
    ?>
    <div id="load">
        <div id="loader">
            <div id="circle"></div>
        </div>
    </div>
    <div id="buttons">
    <?php
    include "php/check.login.php";
    if (isset($_COOKIE["pseudo"]) and isset($_COOKIE["password"])) {
        if (!empty($_COOKIE["pseudo"]) and !empty($_COOKIE["password"])) {
            if (!isAccount($_COOKIE["pseudo"], $_COOKIE["password"])) {
                echo "<a href='service/login.php' class='btns'>Se connecter</a>";
                echo "<a href='service/signin.php' class='btns'>Creer un compte</a>";
            } else {
                echo "<a href='service/addsite.php' class='btns'>Ajouter un site</a>";
            }
        } else {
            echo "<a href='service/login.php' class='btns'>Se connecter</a>";
            echo "<a href='service/signin.php' class='btns'>Creer un compte</a>";
        }
    } else {
        echo "<a href='service/login.php' class='btns'>Se connecter</a>";
        echo "<a href='service/signin.php' class='btns'>Creer un compte</a>";
    }
    ?>
    </div>
    <div id="container">
        <form action="./web/result.php" method="get">
            <label for="search">ExplorerXD</label>
            <input type="text" name="search" id="search" placeholder="Rechercher" required/>
        </form>
        <div id="suggestions"></div>
    </div>
</body>
<script src="javascript/cookie.js"></script>
<script src="javascript/loader.js"></script>
</html>