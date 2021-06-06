<?php
include_once '../CampingMaasvallei/config/database.php';

$SQL = "SELECT * FROM kampeerder";
$stmt = $conn ->prepare($SQL);
$stmt->execute();
$result = $stmt-> fetchAll();
?>
<div class="block-center"> <h1>Contact</h1>
<br>
<br>
<br>
<br>
<p class="block-100p"> Email: campingmaasvallei@gmail.com</p>
<br>
<p class="block-100p"> Telefoonnummer: 024 0000000</p>
<br>
<p class="block-100p">
<br>
Locatiegegevens: Veerweg 8, 5441 PL Oeffelt
</p>
</div>
