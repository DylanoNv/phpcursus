<?php
// Opdr 12b 9015493
// toevoegen.php

include "connect.php";

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $leerling = $_POST['leerling'];
    $cijfer = $_POST['cijfer'];
    $vak = $_POST['vak'];
    $docent = $_POST['docent'];

    $sql = "INSERT INTO cijfers (leerling, cijfer, vak, docent) 
            VALUES (:leerling, :cijfer, :vak, :docent)";
    $stmt = $pdo->prepare($sql);
    $stmt->execute([
        ':leerling' => $leerling,
        ':cijfer' => $cijfer,
        ':vak' => $vak,
        ':docent' => $docent
    ]);
}

header("Location: index.php");
exit;
?>