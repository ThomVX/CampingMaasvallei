<?php
if ($_SESSION['role'] != "beheerder") {
    header('Location: ../CampingMaasvallei/werknemerlogin.php');
}
else{
$id = intval($_GET['id']);
$sql = "DELETE FROM Klachten WHERE id = ?";
$stmt = $conn->prepare($sql);
$stmt->execute([$id]);
header('location: index.php?page=klachtenkijken');
}
?>

