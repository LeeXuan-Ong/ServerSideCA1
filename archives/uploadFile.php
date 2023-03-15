<?php
include 'database.php';
$imageURL = $_FILES['image']['tmp_name'];
$imageData = file_get_contents($imageURL);

$name = $_FILES['image']['name'];
$type = $_FILES['image']['type'];
$sql = "INSERT INTO IMAGES(imgName, imgType, imgContent) VALUES (?, ?, ?)";
$stmt = $conn->prepare($sql);
$stmt->bindParam(1, $name);
$stmt->bindParam(2, $type);
$stmt->bindParam(3, $imageData);
$stmt->execute();





