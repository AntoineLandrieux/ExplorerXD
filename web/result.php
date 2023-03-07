<?php
include '../php/database.php';
?>
<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>ExplorerXD | Result</title>
</head>
<body>
    <div id="container">
        <?php
        if (!isset($_GET["search"]) and !empty($_GET["search"])) {
            header("reload");
        }
        $req = $db->query("SELECT * FROM web WHERE web_name LIKE " + $_GET["search"] +"%v");
        while ($res = $req->fetch()) {
            echo "<div class='result'><a href='" . $res["web_ip"] . "'>" . $res["web_name"] . "</a><span>" . $res["web_name"]. "</span>";
        }
        ?>
    </div>
</body>
</html>