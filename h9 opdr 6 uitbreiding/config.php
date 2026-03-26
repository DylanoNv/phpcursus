<?php
// auteur: Dylano Nietveld
// functie: database connectie

session_start();

$host = "localhost";
$dbname = "gastenboek_14b";
$username = "root";
$password = "";

try {
    $pdo = new PDO("mysql:host=$host;dbname=$dbname;charset=utf8", $username, $password);
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
} catch (PDOException $e) {
    die("Connectie mislukt: " . $e->getMessage());
}
?>