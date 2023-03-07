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
    <div id="cookie">
        <span>ExplorerXD utilise des cookies</span>
        <a onclick="quitModal()" id="accept" class="btn">D'accord</a>
    </div>
    <div id="load">
        <div id="loader">
            <div id="circle"></div>
        </div>
    </div>
    <?php
    include "php/check.login.php";
    if (isset($_COOKIE["pseudo"]) and isset($_COOKIE["password"])) {
        if (!empty($_COOKIE["pseudo"]) and !empty($_COOKIE["password"])) {
            if (!isAccount($_COOKIE["pseudo"], $_COOKIE["password"])) {
                echo "<a href='127.0.0.1/service/login.php' id='btn'>Se connecter</span>";
            }
        }
    }
    ?>
    <div id="container">
        <form action="./web/result.php" method="get">
            <label for="search">ExplorerXD</label>
            <input type="text" name="search" id="search" placeholder="Rechercher"/>
        </form>
        <div id="suggestions"></div>
    </div>
</body>
<script src="javascript/cookie.js"></script>
<script src="javascript/loader.js"></script>
</html>