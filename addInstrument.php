<?php

include 'database.php';
error_reporting(E_ALL);
ini_set('display_errors', '1');

$imageURL = $_FILES['image']['tmp_name'];
$imageData = file_get_contents($imageURL);

$name = $_FILES['image']['name'];
$type = $_FILES['image']['type'];
$sql = "INSERT INTO images(imgName, imgType, imgContent) VALUES (?, ?, ?)";
$stmt = $conn->prepare($sql);
$stmt->bindParam(1, $name);
$stmt->bindParam(2, $type);
$stmt->bindParam(3, $imageData);
$stmt->execute();

$imageId = $conn->lastInsertId();
$sql2 = "INSERT INTO instruments (imageId, insName,insStocks, insDesc, insPrice, insCategory) VALUES (?, ?, ?, ?, ?,?)";
$stmt2 = $conn->prepare($sql2);
$stmt2->bindParam(1,$imageId );
$stmt2->bindParam(2, $_POST['insName']);
$stmt2->bindParam(3, $_POST['insStocks']);
$stmt2->bindParam(4, $_POST['insDesc']);
$stmt2->bindParam(5, $_POST['insPrice']);
$stmt2->bindParam(6, $_POST['insCategory']);
$stmt2->execute();

if($stmt && $stmt2){
    echo "Image uploaded successfully.";
} else{
    echo "Sorry, there was an error uploading your file.";
}

header("Location: Index.php");
