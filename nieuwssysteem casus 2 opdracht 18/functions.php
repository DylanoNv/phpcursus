<?php
// auteur: Dylano Nietveld
// functie: algemene functies voor nieuwssysteem

require_once 'config.php';

function isLoggedIn() {
    return isset($_SESSION['user']);
}

function isAdmin() {
    return isset($_SESSION['user']) && $_SESSION['user']['role'] === 'admin';
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

function getCategorieen() {
    global $conn;

    $sql = "SELECT * FROM categorieen ORDER BY naam";
    $stmt = $conn->prepare($sql);
    $stmt->execute();

    return $stmt->fetchAll();
}

function getBerichten($categorieId = null, $zoekterm = null) {
    global $conn;

    $sql = "SELECT berichten.*, categorieen.naam AS categorie_naam
            FROM berichten
            JOIN categorieen ON berichten.categorie_id = categorieen.id
            WHERE 1";

    $params = [];

    if ($categorieId) {
        $sql .= " AND categorie_id = :categorie_id";
        $params[':categorie_id'] = $categorieId;
    }

    if ($zoekterm) {
        $sql .= " AND (titel LIKE :zoekterm OR inhoud LIKE :zoekterm)";
        $params[':zoekterm'] = "%$zoekterm%";
    }

    $sql .= " ORDER BY datum DESC";

    $stmt = $conn->prepare($sql);
    $stmt->execute($params);

    return $stmt->fetchAll();
}

function getBerichtById($id) {
    global $conn;

    $sql = "SELECT berichten.*, categorieen.naam AS categorie_naam
            FROM berichten
            JOIN categorieen ON berichten.categorie_id = categorieen.id
            WHERE berichten.id = :id";

    $stmt = $conn->prepare($sql);
    $stmt->execute([
        ':id' => $id
    ]);

    return $stmt->fetch();
}

function verhoogGelezen($id) {
    global $conn;

    $sql = "UPDATE berichten SET gelezen = gelezen + 1 WHERE id = :id";
    $stmt = $conn->prepare($sql);

    return $stmt->execute([
        ':id' => $id
    ]);
}

function voegBerichtToe($titel, $inhoud, $categorieId) {
    global $conn;

    $sql = "INSERT INTO berichten (titel, inhoud, categorie_id)
            VALUES (:titel, :inhoud, :categorie_id)";

    $stmt = $conn->prepare($sql);

    return $stmt->execute([
        ':titel' => $titel,
        ':inhoud' => $inhoud,
        ':categorie_id' => $categorieId
    ]);
}

function updateBericht($id, $titel, $inhoud, $categorieId) {
    global $conn;

    $sql = "UPDATE berichten
            SET titel = :titel,
                inhoud = :inhoud,
                categorie_id = :categorie_id
            WHERE id = :id";

    $stmt = $conn->prepare($sql);

    return $stmt->execute([
        ':id' => $id,
        ':titel' => $titel,
        ':inhoud' => $inhoud,
        ':categorie_id' => $categorieId
    ]);
}

function verwijderBericht($id) {
    global $conn;

    $sql = "DELETE FROM berichten WHERE id = :id";
    $stmt = $conn->prepare($sql);

    return $stmt->execute([
        ':id' => $id
    ]);
}