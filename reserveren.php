<?php
if (!isset($_SESSION['id'])) {
    header('Location: login.php');
}
$errors = [];
if (isset($_POST['submit'])) {
    if ($_POST['begintijd'] == '') {
        $errors['begintijd'] = "Wat is de eerste dag dat je op de campging wilt staan? ontbreekt";
    }
    if ($_POST['eindtijd'] == '') {
        $errors['eindtijd'] = "Wat is de laatste dag dat je op de campging wilt staan? ontbreekt";
    }
    if (count($errors) == 0) {

        //Hier haal je de plaatsen op 
        $sql = "SELECT * FROM reservering WHERE type = ? ";
        $stmt = $conn->prepare($sql);
        $stmt->execute([$_POST['type']]);
        $result = $stmt->fetchAll();

        $begintijd = strtotime($_POST['begintijd']);
        $eindtijd = strtotime($_POST['eindtijd']);
        $reseveren = false;
        $lengte = count($result);
        for ($i = 0; $i < $lengte; $i++) {
            //Hier haal je de reserveringstijden op
            $sql1 = "SELECT * from reserveringstijden INNER JOIN reservering ON reservering.id=reserveringstijden.id_plaats where reservering.id = ? and `begintijd` <= ? OR eindtijd > ?";
            $stmt1 = $conn->prepare($sql1);
            $stmt1->execute([$result[$i]['id'], $begintijd, $eindtijd]);
            $result1 = $stmt1->fetchAll();            
            
            if ( (empty($result1[$i]) || $result1[$i]['begintijd'] >= $begintijd || $result1[$i]['eindtijd'] < $eindtijd)  && $reseveren == false ) {
                echo'
                    <button onclick="thealert()">reserveren</button>
                    function thealert() {
                    alert( "Weet je zeker dat je wilt reserveren?");
                    }
                </script>
                ';
                $reseveren = true;
                $sql2 = "INSERT INTO `reserveringstijden`(`id_plaats`, `begintijd`, `eindtijd`, `id_kampeerder`) VALUES (?,?,?,?) ";
                $stmt2 = $conn->prepare($sql2);
                $stmt2->execute([$result[0]['id'], $_POST['begintijd'], $_POST['eindtijd'], $_SESSION['id']]);

            } 
        }
    }
}
?>
<p>U wilt reserveren: </p>
<div class="blockform">
    <form method="post">
        <label for="Plaats">Waar slaap je in?</label><br>
        <select id="type" name="type"><br>
            <option value="tent">tent</option>
            <option value="camper">camper</option>
        </select>
        <br>
        <label>Eerste dag</label><br>
        <input type="date" id="begintijd" name="begintijd" value=" <?php echo (isset($_POST['begintijd']) ? $_POST['begtintijd'] : ''); ?> "><br>
        <label>Laatste dag</label><br>
        <input type="date" id="eindtijd" name="eindtijd" value=" <?php echo (isset($_POST['eindtijd']) ? $_POST['eindtijd'] : ''); ?> "> <br>
        <button type="submit" name="submit">reserveren</button>
    </form>
</div>