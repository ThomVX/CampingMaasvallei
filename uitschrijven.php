<?php
    if (!isset($_SESSION['id'])) {
        header('Location: login.php');
    }

    $sql1 = "SELECT * FROM `inschrijven` WHERE id = ?";
    $stmt1 = $conn->prepare($sql1);
    $stmt1->execute([$_SESSION["id"]]);
    $result1 = $stmt1->fetchAll();
    if (empty($result1)) {
        echo "U heeft zich niet eens ingescherven!";
    } else {
        if (isset($_POST['submit'])) {
            $sql = "INSERT INTO `uitschrijven`(`id`, `tijd`) VALUES (?, NOW())";
            $stmt = $conn->prepare($sql);
            $stmt->execute([$_SESSION['id']]);
        }
    }
    ?>
    <form method="post">
        <label for="gebruikersnaam">Wil je nu afmelden op de camping?</label><br>
        <button type="submit" name="submit" onclick="thealert()">Afmelden</button>
    </form>
    <script>
        function thealert() {
            alert( "Weet je zeker dat je van de camping bent?");
        }
    </script>
