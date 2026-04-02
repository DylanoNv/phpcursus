<?php
// Dylano Nietveld
// delete.php - optie verwijderen

require_once __DIR__ . "/db.php";

$id = (int)($_GET["id"] ?? 0);

if ($id > 0) {
    $stmt = $pdo->prepare("DELETE FROM optie WHERE id = ?");
    $stmt->execute([$id]);
}

header("Location: index.php");
exit;