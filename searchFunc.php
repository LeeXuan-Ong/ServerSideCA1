<?php

include 'database.php';

$searchInput = $_GET['q'];

$sql = "SELECT * FROM INSTRUMENTS WHERE insName LIKE '%?%' OR insDesc LIKE '%?%' OR insCategory LIKE '%?%'";
$stmt = $conn->prepare($sql);
$stmt->bindParam(1,$searchInput);
$stmt->bindParam(2,$searchInput);
$stmt->bindParam(3,$searchInput);
$stmt->execute();
$products = $stmt->execute();


?>