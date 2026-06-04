<?php
// Dylano Nietveld
// Functies voor uitgebreide rekenmachine

require_once 'config.php';

function bereken($invoer, $afronding) {
    $invoer = strtolower(trim($invoer));

    // woorden vervangen naar phpsymb
    $invoer = str_replace("x", "*", $invoer);
    $invoer = str_replace(",", ".", $invoer);

    // alleen veilige tekens toestaan
    if (!preg_match('/^[0-9+\-*\/().% ^sqrt]+$/', $invoer)) {
        return "Ongeldige invoer";
    }

    // sqrt vervangen
    $invoer = preg_replace('/sqrt\((.*?)\)/', 'sqrt($1)', $invoer);

    // machtsteken vervangen
    $invoer = str_replace("^", "**", $invoer);

    try {
        $resultaat = eval("return $invoer;");
    } catch (Throwable $e) {
        return "Fout in berekening";
    }

    if (!is_numeric($resultaat)) {
        return "Fout in berekening";
    }

    return round($resultaat, $afronding);
}

function slaBerekeningOp($invoer, $resultaat) {
    global $conn;

    $sql = "INSERT INTO berekeningen (invoer, resultaat)
            VALUES (:invoer, :resultaat)";
    $stmt = $conn->prepare($sql);

    return $stmt->execute([
        ':invoer' => $invoer,
        ':resultaat' => $resultaat
    ]);
}

function getBerekeningen() {
    global $conn;

    $sql = "SELECT * FROM berekeningen ORDER BY datum_tijd DESC";
    $stmt = $conn->prepare($sql);
    $stmt->execute();

    return $stmt->fetchAll(PDO::FETCH_ASSOC);
}