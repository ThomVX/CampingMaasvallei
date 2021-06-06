<?php


if(isset($_SESSION['id'])) {
$id = intval($_SESSION['id']);

$sql = "SELECT * FROM kampeerder WHERE id = ?";
$stmt = $conn->prepare($sql);
$stmt->execute([$id]);
$result = $stmt->fetchAll();

}
?>

<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="icon" href="../Campingmaasvallei/images/logocamping2.png">
  <link rel="stylesheet" href="../Campingmaasvallei/css/reset.css">
  <link rel="stylesheet" href="../Campingmaasvallei/css/style.css">
  <title>Camping Maasvallei</title>
</head>

<body class="body-login">
  <header>
    </div>
    <div class="container-header">
      <a href="index.php?home.php"> <img id="logo" src="../Campingmaasvallei/images/logocamping2.png"> </a>
      <nav>
        <li><a href="index.php?home.php">Home</a></li>
        <li><a href="index.php?page=omgeving">Omgeving</a></li>
        <li><a href="index.php?page=contact">Contact</a></li>
        <?php if (!isset($_SESSION['id'])): ?>
          <li><a href="index.php?page=login">Inloggen</a> </li>
          <li><a href="index.php?page=aanmelden">Aanmelden</a> </li>
        <?php elseif (isset($_SESSION['werknemer'])): ?>
          <?php if ($_SESSION['role'] == "administratiefmedewerker"): ?>
            <li><a href="">Administratief Medewerker</a> </li>
            <li><a href="index.php?page=klachtenkijken">Klachten</a> </li>
            <li><a href="index.php?page=logout">Uitloggen</a> </li>
          <?php elseif ($_SESSION['role'] == "schoonmaker"): ?>
            <li><a href="">Schoonmaker</a> </li>
            <li><a href="index.php?page=klachtenkijken">Klachten</a> </li>
            <li><a href="index.php?page=logout">Uitloggen</a> </li>
          <?php elseif ($_SESSION['role'] == "onderhoudsmedewerker"): ?>
            <li><a href="">Onderhoudsmedewerker</a> </li>
            <li><a href="index.php?page=klachtenkijken">Klachten</a> </li>
            <li><a href="index.php?page=logout">Uitloggen</a> </li>
          <?php elseif ($_SESSION['role'] == "beheerder"): ?>
            <li><a href="">Beheerder</a> </li>
            <li><a href="index.php?page=klachtenkijken">Klachten</a> </li>
            <li><a href="index.php?page=logout">Uitloggen</a> </li>
          <?php endif;?>
        <?php else:?>
          <li><a href="index.php?page=reserveren">Reserveren</a> </li>  
          <li><a href="index.php?page=inschrijven">Inschrijven</a> </li>     
          <li><a href="index.php?page=uitschrijven">Uitschrijven</a> </li>  
          <li><a href="index.php?page=klachtindienen">Klacht indienen</a> </li>
          <li><a href="index.php?page=logout">Uitloggen</a> </li>
          <div class="headerprofilepage">
          <li><a href="index.php?page=profilepage">Accountgegevens</a> </li>  
          </div>
        <?php endif;?>
      </nav>
    </div>
  </header>
