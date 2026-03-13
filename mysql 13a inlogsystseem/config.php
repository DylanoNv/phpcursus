<?php
// auteur: Dylano Nietveld
// functie: database connectie en sessie starten

session_start();

$servername = "localhost";
$dbname = "studenten_login";
$username = "root";
$password = "";

try {
    $conn = new PDO("mysql:host=$servername;dbname=$dbname;charset=utf8", $username, $password);
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
} catch(PDOException $e) {
    die("Connectie mislukt: " . $e->getMessage());
}
?>