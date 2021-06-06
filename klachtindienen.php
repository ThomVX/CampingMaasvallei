<?php
if (!isset($_SESSION['id'])){
    header('Location: login.php');
}

$errors = [];
if(isset($_POST['submit'])){

    if ($_POST['soort_klacht'] == ''){
        $errors['soortklacht'] = "soortklacht";
    }
    if ($_POST['beschrijving'] == ''){
        $errors['beschrijving'] = "geen beschrijving";
    }
    if ($_POST['voor_wie'] == ''){
        $errors['voor_wie'] = "geen voor wie?";
    }

    if (count($errors) == 0){
        $sql= "INSERT INTO klachten( soort_klacht, beschrijving, voor_wie ) VALUES (?,?,?) ";
        $stmt = $conn-> prepare($sql);
        $stmt->execute([
            $_POST['soort_klacht'],
            $_POST['beschrijving'],
            $_POST['voor_wie']
        ]);
        echo "<h2>Klacht is ingediend!</h2>";
    }
}
?>
<html>
<div class="blockform">
<form ACTION="" method="post">
    <h2>Klacht indienen</h2>
    <label for="soort klacht">Soort klacht</label><br>
    <input type="text" id="soortklass" name="soort_klacht" value="<?php echo (isset($_POST['soort_klacht']) ? $_POST['soort_klacht'] : ''); ?>"><br>
    <p class="rood ontbreekt"> <?php echo (isset($errors['soort_klacht']) ? $errors['soort_klacht'] : ''); ?> </p>
    <!-- V HIER BENEDEN MOET NA KLACHT INDIENEN BESCHRIJVING BEHOUDEN WORDEN, ZOALS BIJ SOORT KLACHT EN VOOR WIE! V -->
    <label for="beschrijving">Beschrijving</label><br>
    <textarea id="beschrijving" name="beschrijving" rows="6" cols="22" value="<?php echo (isset($_POST['beschrijving']) ? $_POST['beschrijving'] : ''); ?>"></textarea><br>
    <p class="rood ontbreekt"> <?php echo (isset($errors['beschrijving']) ? $errors['beschrijving'] : ''); ?> </p>

    <label for="voor_wie">Voor wie</label><br>
    <input type="text" id="voor_wie" name="voor_wie" value="<?php echo (isset($_POST['voor_wie']) ? $_POST['voor_wie'] : ''); ?>"><br>
    <p class="rood ontbreekt"> <?php echo (isset($errors['voor_wie']) ? $errors['voor_wie'] : ''); ?> </p>
    <button type="submit" name="submit">Klacht indienen</button>
</form>
</div>
</html>