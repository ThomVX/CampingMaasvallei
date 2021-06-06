<?php
include_once '../CampingMaasvallei/config/database.php';

$SQL = "SELECT * FROM kampeerder";
$stmt = $conn ->prepare($SQL);
$stmt->execute();
$result = $stmt-> fetchAll();
?>
<div class="block-center"> <h1>Omgeving</h1>
<br>
   <p class="block-100p"> Het maasheggenlandschap is een eeuwenoud landschap dat uniek is in West-Europa. Het ligt tussen Mook en Bergen, maar aan de Brabantse kant van de Maas heeft het de landbouw mechanisering het best overleefd. Hier zijn talrijke kleine percelen, die afgescheiden worden door gevlochten heggen van onder andere meidoorn en Sleedoorn. Ertussen groeien vlier, hondsroos, kamperfoelie etc.
   </p>
<br>
<img id="centerpic" src="../Campingmaasvallei/images/omgevingpic.jpg">
<p class="block-100p">
<br>
Aldus zijn massieve veekeringen ontstaan, die – met name in de lente – een lust zijn voor het oog. De maasheggen bieden aan talrijke vogels en andere dieren een uitstekende beschutting met als resultaat een uitzonderlijk rijke flora en fauna.
</p>
<br>
<img id="centerpic" src="../Campingmaasvallei/images/omgevingpic2.jpg">
<p class="block-100p">
<br>
Unesco heeft in de zomer van 2018 de biosfeerstatus verleend aan het gebied de Maasheggen. Met deze statustoekenning treden de Maasheggen toe tot een wereldwijd netwerk van meer dan 650 Unesco-biosfeergebieden. De Maasheggen zijn het enige biosfeergebied in Nederland! Meer informatie kunt u vinden op www.maasheggenunesco.com.
</p>
<br>
<p class="block-100p">
Jaarlijks is er in maart ook het traditionele maasheggenvlechten. Een groots evenement waarin de kunst van het maasheggenvlechten wordt beoordeeld. Dit evenement vindt plaats langs camping de Maasvallei!
</p>
<br>
<p class="block-100p">
Meer info leest u op www.maasheggen.nl
</p>
<br>
<p class="block-100p">
Wij verwelkomen u graag!!
</p>
<p class="block-100p">
</div>
