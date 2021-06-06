<?php
    if (!isset($_SESSION['id'])) {
        header('Location: login.php');
    }

    $sql1 = "SELECT * FROM `inschrijven` WHERE id = ?";
    $stmt1 = $conn->prepare($sql1);
    $stmt1->execute([$_SESSION["id"]]);
    $result1 = $stmt1->fetchAll();
    if (!empty($result1)) {
        echo "U heeft zich al ingescherven!";
    } else {
        if (isset($_POST['submit'])) {
            $sql = "INSERT INTO `inschrijven`(`id`, `tijd`) VALUES (?, NOW())";
            $stmt = $conn->prepare($sql);
            $stmt->execute([$_SESSION['id']]);
        }
    }
    ?>
    <form method="post">
        <label for="gebruikersnaam">Ben je aangekomen op de camping en wil je nu jezelf aanmelden?</label><br>
        <button type="submit" name="submit" onclick="thealert()">aanmelden</button>
    </form>
    <script>
        function thealert() {
            alert( "Weet je zeker dat je op de camping bent?");
        }
    </script>