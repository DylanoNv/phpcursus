<?php
require_once 'config.php';

function filterScheldwoorden($tekst) {
    $woorden = ["klootzak", "eikel", "lul", "kut", "tering"];
    return str_ireplace($woorden, "***", $tekst);
}

function formatBericht($tekst) {
    $tekst = htmlspecialchars($tekst);

    $tekst = preg_replace('/\[b\](.*?)\[\/b\]/is', '<strong>$1</strong>', $tekst);
    $tekst = preg_replace('/\[i\](.*?)\[\/i\]/is', '<em>$1</em>', $tekst);
    $tekst = preg_replace('/\[color=(.*?)\](.*?)\[\/color\]/is', '<span style="color:$1;">$2</span>', $tekst);
    $tekst = preg_replace('/\[size=(.*?)\](.*?)\[\/size\]/is', '<span style="font-size:$1px;">$2</span>', $tekst);

    $tekst = str_replace(":)", "😊", $tekst);
    $tekst = str_replace(":(", "😢", $tekst);
    $tekst = str_replace(":o", "😮", $tekst);

    return nl2br($tekst);
}

function voegIdeeToe($naam, $email, $titel, $bericht) {
    global $conn;

    $bericht = filterScheldwoorden($bericht);

    $sql = "INSERT INTO ideeen (naam, email, titel, bericht)
            VALUES (:naam, :email, :titel, :bericht)";
    $stmt = $conn->prepare($sql);

    return $stmt->execute([
        ':naam' => $naam,
        ':email' => $email,
        ':titel' => $titel,
        ':bericht' => $bericht
    ]);
}

function getIdeeen() {
    global $conn;

    $sql = "SELECT * FROM ideeen ORDER BY datum DESC";
    $stmt = $conn->prepare($sql);
    $stmt->execute();

    return $stmt->fetchAll(PDO::FETCH_ASSOC);
}
?>