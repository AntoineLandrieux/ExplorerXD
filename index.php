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
        <a onclick="quitModal()" id="accept" class="btn">Accepter</a>
        <a onclick="quitModal()" id="denny" class="btn">Refuser</a>
    </div>
    <div id="load">
        <div id="loader">
            <div id="circle"></div>
        </div>
    </div>
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