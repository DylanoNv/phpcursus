<?php
// Dylano Nietveld - crud toets
// delete.php - Bewerkt voor tabel bestemming in database reizen

require_once __DIR__ . "/db.php";

$id = $_GET["id"] ?? "";

if ($id !== "") {
    $stmt = $pdo->prepare("DELETE FROM bestemming WHERE idbestemming = ?");
    $stmt->execute([$id]);
}

header("Location: index.php");
exit;