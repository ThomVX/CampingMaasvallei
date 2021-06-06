<?php
require_once('layout/header.php');

$errors = [];
if(isset($_POST['submit'])) {
    if ($_POST['gebruikersnaam'] == '') {
        $errors['gebruikersnaam'] = "Gebruikersnaam ontbreekt";
    }
    if ($_POST['wachtwoord'] == '') {
        $errors['wachtwoord'] = "*Wachtwoord ontbreekt";
    }
    if (count($errors) == 0) {
        //Hier moet ie checken op gebruikersnaam OF email!
        $sql = "SELECT gebruikersnaam, wachtwoord, role, id FROM werknemer  WHERE gebruikersnaam = ? AND wachtwoord = ?";
        $stmt = $conn->prepare($sql);
        $stmt->execute([$_POST['gebruikersnaam'], $_POST['wachtwoord']]);
        $result = $stmt->fetchAll();

        if (empty($result[0]['wachtwoord']) || empty($result[0]['gebruikersnaam']) ) {
            echo "Gebruikersnaam/Wachtwoord is incorrect";
        }
        else{
            $_SESSION['werknemer'] = 1;
            $_SESSION['id'] = $result[0]['id'];
            $_SESSION['role'] = $result[0]['role'];
            echo "Wachtwoord is correct";
            header('Location: index.php?home.php');
        }

    }
}
?>

<!doctype html>
<html lang="nl">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
    </head>
    <body class="body-login">
    <div class="blockform">
        <form method="post">
            <div class="title"><h1>Inloggen werknemer</h1></div>
            <input type="text" id="" name="gebruikersnaam" placeholder="Gebruikersnaam" value="<?php echo (isset($_POST['gebruikersnaam']) ? $_POST['gebruikersnaam'] : ''); ?>"><br>
            <?php echo (isset($errors['gebruikersnaam']) ? $errors['gebruikersnaam'] : ''); ?><br>
            <input type="password" id="wachtwoord" name="wachtwoord" placeholder="Wachtwoord" value="<?php echo (isset($_POST['wachtwoord']) ? $_POST['wachtwoord'] : ''); ?>"><br>
            <?php echo (isset($errors['wachtwoord']) ? $errors['wachtwoord'] : ''); ?><br>
            <button type="submit" name="submit">inloggen</button>
        </form>
    </div>
    </body>
</html>