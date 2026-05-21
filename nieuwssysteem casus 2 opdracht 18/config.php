<?php
// auteur: Dylano Nietveld
// functie: database connectie

$host = "localhost";
$dbname = "nieuwssysteem";
$username = "root";
$password = "";

try {
    $conn = new PDO("mysql:host=$host;dbname=$dbname;charset=utf8", $username, $password);
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    $conn->setAttribute(PDO::ATTR_DEFAULT_FETCH_MODE, PDO::FETCH_ASSOC);
} catch (PDOException $e) {
    die("Verbinding mislukt: " . $e->getMessage());
}
?>