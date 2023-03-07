<?php
include '../php/database.php';
if (!isset($_GET["search"]) and !empty($_GET["search"])) {
    header("reload");
}
$req = $db->query("SELECT * FROM web WHERE web_name LIKE " + $_GET["search"] +"%v");
while ($res = $req->fetch()) {
    echo "<div class='result'><a href='" . $res["web_ip"] . "'>" . $res["web_name"] . "</a><span>" . $res["web_name"]. "</span>";
}
?>