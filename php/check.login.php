<?php
function isAccount($user, $paswd) {
    $db = new PDO("mysql:host=127.0.0.1;dbname=explorerxd;charset=UTF8", "root", "");
    $req = $db->prepare("SELECT * FROM user WHERE user_name = :n AND user_paswd = :p");
    $req->execute(array("n" => htmlspecialchars($user), "p" => $paswd));
    if ($req->rowCount() == 1) {
        return 1;
    } else {
        return 0;
    }
}
?>