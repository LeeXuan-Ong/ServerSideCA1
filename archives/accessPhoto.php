<?php
include 'database.php';
$sql = "SELECT * FROM IMAGES WHERE imgId = 8";

$stmt = $conn->prepare($sql);
$stmt->execute();
$row = $stmt->fetch();

echo '<img src="data:'.$row['imgType'].';base64,'.base64_encode($row['imgContent']).'" alt="image" >';