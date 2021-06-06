<?php
$errors = [];

if(isset($_POST['submit'])){

    if ($_POST['gebruikersnaam'] == ''){
        $errors['gebruikersnaam'] = "*Gebruikersnaam ontbreekt";
    }
    if ($_POST['voornaam'] == ''){
        $errors['voornaam'] = "*voornaam ontbreekt";
    }
    if ($_POST['achternaam'] == ''){
        $errors['achternaam'] = "*Achternaam ontbreekt";
    }
    if ($_POST['email'] == ''){
        $errors['email'] = "*Email ontbreekt";
    }
    $email = $_POST["email"];
    if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
        $errors['email'] = "Invalid email format!";
    }
    if ($_POST['wachtwoord'] == ''){
        $errors['wachtwoord'] = "*Wachtwoord ontbreekt";
    }
    if ($_POST['telefoonnummer'] == ''){
        $errors['telefoonnummer'] = "*Telefoonnummer ontbreekt";
    }
    if ($_POST['adres'] == ''){
        $errors['adres'] = "*Adres ontbreekt";
    }
    if (count($errors) == 0){
        $sql= "INSERT INTO `kampeerder`( `gebruikersnaam`, `voornaam`, `achternaam`, `email`, `wachtwoord`, `telefoonnummer`, `adres`) VALUES (?,?,?,?,?,?,?) ";
        $stmt = $conn-> prepare($sql);
        $stmt->execute([
            $_POST['gebruikersnaam'],
            $_POST['voornaam'],
            $_POST['achternaam'],
            $_POST['email'],
            $_POST['wachtwoord'],
            $_POST['telefoonnummer'],
            $_POST['adres']
        ]);
        $sql = "SELECT id FROM kampeerder  WHERE gebruikersnaam = ? AND wachtwoord = ?";
            $stmt = $conn->prepare($sql);
            $stmt->execute([$_POST['gebruikersnaam'], $_POST['wachtwoord']]);
            $result = $stmt->fetchAll();

            $_SESSION['id'] = $result[0]['id'];
            header('Location: index.php?home.php');
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
            <div class="title"><h1>Aanmelden</h1></div>
            <div class="divleft">
            <input type="text" id="gebruikersnaam" name="gebruikersnaam" placeholder="Gebruikersnaam" value="<?php echo (isset($_POST['gebruikersnaam']) ? $_POST['gebruikersnaam'] : ''); ?>"><br>
            <?php echo (isset($errors['gebruikersnaam']) ? $errors['gebruikersnaam'] : ''); ?><br>

            <input type="text" id="voornaam" name="voornaam" placeholder="Voornaam" value="<?php echo (isset($_POST['voornaam']) ? $_POST['voornaam'] : ''); ?>"><br>
            <?php echo (isset($errors['voornaam']) ? $errors['voornaam'] : ''); ?><br>
            
            <input type="text" id="achternaam" name="achternaam" placeholder="Achternaam" value="<?php echo (isset($_POST['achternaam']) ? $_POST['achternaam'] : ''); ?>"><br>
            <?php echo (isset($errors['achternaam']) ? $errors['achternaam'] : ''); ?><br>
            
            <input type="email" id="email" name="email" placeholder="Email" value="<?php echo (isset($_POST['email']) ? $_POST['email'] : ''); ?>"><br>
            <?php echo (isset($errors['email']) ? $errors['email'] : ''); ?><br>
            </div>
            <div class="divright">
            <input type="text" id="telefoonnummer" name="telefoonnummer" placeholder="Telefoonummer" value="<?php echo (isset($_POST['telefoonnummer']) ? $_POST['telefoonnummer'] : ''); ?>"><br>
            <?php echo (isset($errors['telefoonnummer']) ? $errors['telefoonnummer'] : ''); ?><br>
            
            <input type="text" id="adres" name="adres" placeholder="Adres" value="<?php echo (isset($_POST['adres']) ? $_POST['adres'] : ''); ?>"><br>
            <?php echo (isset($errors['adres']) ? $errors['adres'] : ''); ?><br>

            <input type="password" id="wachtwoord" name="wachtwoord" placeholder="Wachtwoord" value="<?php echo (isset($_POST['wachtwoord']) ? $_POST['wachtwoord'] : ''); ?>"><br>
            <?php echo (isset($errors['wachtwoord']) ? $errors['wachtwoord'] : ''); ?><br>
            </div>
            <button type="submit" name="submit">Aanmelden</button>
        </form>

    </div>
    </body>
</html>