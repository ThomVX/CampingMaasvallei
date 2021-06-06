<?php
if (!isset($_SESSION['id'])){
    header('Location: login.php');
}

$id = intval($_SESSION['id']);

$sql = "SELECT * FROM kampeerder WHERE id = ?";
$stmt = $conn->prepare($sql);
$stmt->execute([$id]);
$result = $stmt->fetchAll();

if(isset($_POST['submit'])){
        $sql = "UPDATE kampeerder SET telefoonnummer = ?, adres = ?, email = ?, wachtwoord = ? WHERE id =?";
        $stmt = $conn->prepare($sql);
        $stmt->execute([
            $_POST['telefoonnummer'],
            $_POST['adres'],
            $_POST['email'],
            $_POST['wachtwoord'],
            $id
        ]);
        header('location: index.php?page=profilepage');
}
?>

<html>
    <div class="profilepageform">
        <form method="post">
            <h3 class="profilepagetitle">Accountgegevens</h3>
            <div class="row mt-3">
                <div class="col-md-12"><label class="labels">Telefoonnummer</label><p><?php echo $result[0]['telefoonnummer']; ?></p><input type="text" id="telefoonnummer" name="telefoonnummer" class="form-control" placeholder="Nieuw telefoonummer" value=""></div>
                <div class="col-md-12"><label class="labels">Adres</label><p><?php echo $result[0]['adres']; ?></p><input type="text" id="adres" name="adres" class="form-control" placeholder="Nieuw adres" value=""></div>
                <div class="col-md-12"><label class="labels">Email</label><p><?php echo $result[0]['email']; ?></p><input type="email" id="email" name="email" class="form-control" placeholder="Nieuwe email" value=""></div>
                <div class="col-md-12"><label class="labels">Wachtwoord</label><p><?php echo $result[0]['wachtwoord']; ?></p><input type="password" id="wachtwoord" name="wachtwoord" class="form-control" placeholder="Nieuw wachtwoord" value=""></div>
                <button type="submit" name="submit">Opslaan</button>
            </div>
        </form>
    </div>
</html>