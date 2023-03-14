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
    include '../php/database.php';
    if (isset($_POST['crpseudo']) AND isset($_POST['crpass1']) AND isset($_POST['crpass2'])) {
        if (!empty($_POST['crpseudo']) AND !empty($_POST['crpass1']) AND !empty($_POST['crpass2'])) {
            $req = $db->prepare("SELECT * FROM user WHERE user_name=:pseudo");
            $req->execute(['pseudo' => htmlspecialchars($_POST['crpseudo'])]);
            $result = $req->fetch();
            if ($result == false) {
                if ($_POST['crpass1'] == $_POST['crpass2']) {
                    $crpass = password_hash($_POST['crpass1'], PASSWORD_BCRYPT, ['cost'=>12,]);
                    $users = $db->prepare("INSERT INTO user(user_name, user_paswd) VALUES (?,?)");
                    $users->execute(array(htmlspecialchars($_POST['crpseudo']), $crpass));
                    setcookie("pseudo", htmlspecialchars($_POST["crpseudo"]), time()+(60*60*24*30), '/');
                    setcookie("password", $crpass, time()+(60*60*24*30), '/');
                    header("Location: ../index.php");
                    exit(); 
                } else {
                    echo "<span id='error'>Les deux mot de passe doivent êtres les mêmes ! </span>";
                }
            } else {
                echo "<span id='error'>Pseudo utilisé par une autre personne ! </span>";
            }
        } else {
            echo "<span id='error'> Tous les champs doivent êtres remplit </span>";
        }
    }
    ?>
    <form action="" method="POST">
        <h1>S'inscrire</h1>
        <input type="text" name="crpseudo" required id="psd" required placeholder="Votre pseudo">
        <input type="password" name="crpass1" required id="pwd" required placeholder="Votre mot de passe">
        <input type="password" name="crpass2" required id="pwdb" required placeholder="Confirmer votre mot de passe">
        <input type="submit" value="Valider !">
    </form>
</body>
</html>