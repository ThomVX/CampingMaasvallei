<?php
if (!isset($_SESSION['id'], $_SESSION['werknemer'])){
    header('Location: werknemerlogin.php');
}

$id = intval($_SESSION['id']);

$sql = "SELECT * FROM klachten";
$stmt = $conn->prepare($sql);
$stmt->execute([$id]);
$result = $stmt->fetchAll();

foreach ($result as $res) { ?>
    <div class="row">
        <div class="col-md-5">
            <h3><?php echo "ID: " . $res['id'];?></h3>
            <h3><?php echo "Soort klacht: " . $res['soort_klacht'];?></h3>
            <h3><?php echo "Beschrijving: " . $res['beschrijving'];?></h3>
            <h3><?php echo "Voor: " . $res['voor_wie'];?></h3>

            <?php if ($_SESSION['role'] == "beheerder"): ?>
            <a class="klachtverwijderen" href="index.php?page=klachtverwijderen&id=<?php echo $res["id"];?>">Verwijderen</a>
            <?php endif;?>
        </div>
    </div>
    <hr>
    <?php } ?>

