<?php
// opdr 12b 9015493
// connect.php

$host = "localhost";
$dbname = "cijfersysteem";
$username = "root";
$password = "";

try {
    $pdo = new PDO("mysql:host=$host;dbname=$dbname;charset=utf8", $username, $password);
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
} catch (PDOException $e) {
    die("Connectie mislukt: " . $e->getMessage());
}
?>