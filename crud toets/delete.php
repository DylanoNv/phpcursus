<?php
// Dylano Nietveld - crud toets
// delete.php - bestemming verwijderen

require_once __DIR__ . "/db.php";

$id = $_GET["id"] ?? "";

if ($id !== "") {
    $stmt = $pdo->prepare("DELETE FROM bestemming WHERE idbestemming = ?");
    $stmt->execute([$id]);
}

header("Location: index.php");
exit;