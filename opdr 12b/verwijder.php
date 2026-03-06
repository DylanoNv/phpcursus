<?php
// Opdr 12b 9015493
// verwijder.php

include "connect.php";

if (isset($_GET['id'])) {
    $id = $_GET['id'];

    $sql = "DELETE FROM cijfers WHERE id = :id";
    $stmt = $pdo->prepare($sql);
    $stmt->execute([
        ':id' => $id
    ]);
}

header("Location: index.php");
exit;
?>