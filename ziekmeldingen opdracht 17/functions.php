<?php
// auteur: Dylano Nietveld
// functie: algemene functies voor ziekmeldingen

include_once 'config.php';

function isLoggedIn() {
    return isset($_SESSION['user']);
}

function login($username, $password) {
    global $conn;

    $sql = "SELECT * FROM users WHERE username = :username AND password = :password";
    $stmt = $conn->prepare($sql);
    $stmt->execute([
        ':username' => $username,
        ':password' => $password
    ]);

    return $stmt->fetch();
}

function getZiekmeldingen() {
    global $conn;

    $sql = "SELECT * FROM ziekmeldingen ORDER BY datum DESC";
    $stmt = $conn->prepare($sql);
    $stmt->execute();

    return $stmt->fetchAll();
}

function getZiekmeldingById($id) {
    global $conn;

    $sql = "SELECT * FROM ziekmeldingen WHERE id = :id";
    $stmt = $conn->prepare($sql);
    $stmt->execute([':id' => $id]);

    return $stmt->fetch();
}

function insertZiekmelding($docent_naam, $reden, $datum) {
    global $conn;

    $sql = "INSERT INTO ziekmeldingen (docent_naam, reden, datum)
            VALUES (:docent_naam, :reden, :datum)";
    $stmt = $conn->prepare($sql);

    return $stmt->execute([
        ':docent_naam' => $docent_naam,
        ':reden' => $reden,
        ':datum' => $datum
    ]);
}

function updateZiekmelding($id, $docent_naam, $reden, $datum) {
    global $conn;

    $sql = "UPDATE ziekmeldingen 
            SET docent_naam = :docent_naam, reden = :reden, datum = :datum
            WHERE id = :id";
    $stmt = $conn->prepare($sql);

    return $stmt->execute([
        ':id' => $id,
        ':docent_naam' => $docent_naam,
        ':reden' => $reden,
        ':datum' => $datum
    ]);
}

function deleteZiekmelding($id) {
    global $conn;

    $sql = "DELETE FROM ziekmeldingen WHERE id = :id";
    $stmt = $conn->prepare($sql);

    return $stmt->execute([':id' => $id]);
}
?>