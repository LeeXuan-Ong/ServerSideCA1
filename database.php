<?php
//
//$dsn = 'mysql:host=localhost;dbname=D00253282';
//$username = 'D00253282';
//$password = 'XZxzv1ob';

$dsn = 'mysql:host=localhost;dbname=instrument_data';
$username = 'root';
$password = '';

try {
    $conn = new PDO($dsn, $username, $password);
    $conn -> setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
} catch (PDOException $e) {
    $error_message = $e->getMessage();
    include('database_error.php');
    exit();
}
