<?php
function isAccount($user, $paswd) {
    $db = new PDO("mysql:host=localhost;dbname=explorerxd;charset=UTF8", "root", "");
    $req = $db->prepare("SELECT * FROM user WHERE user_name = :named AND user_paswd = :paswd");
    $req->execute(array(":named" => $user, ":paswd" => $paswd));
    if ($req->rowCount() == 1) {
        return 1;
    } else {
        return 0;
    }
}
?>