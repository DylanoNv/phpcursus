<?php
// Dylano Nietveld
// Functies voor statistiekensysteem

require_once 'config.php';

function registreerBezoeker() {
    global $conn;

    $landen = ['Nederland', 'Belgie', 'Duitsland', 'Frankrijk', 'Spanje'];
    $providers = ['Ziggo', 'KPN', 'Vodafone', 'T-Mobile', 'Odido'];
    $browsers = ['Chrome', 'Firefox', 'Edge', 'Safari'];

    $land = $landen[array_rand($landen)];
    $ip_adres = gethostbyname(gethostname());
    $provider = $providers[array_rand($providers)];
    $browser = $_SERVER['HTTP_USER_AGENT'] ?? $browsers[array_rand($browsers)];
    $datum_tijd = date('Y-m-d H:i:s');
    $referer = $_SERVER['HTTP_REFERER'] ?? 'direct';

    $sql = "INSERT INTO bezoekers (land, ip_adres, provider, browser, datum_tijd, referer)
            VALUES (:land, :ip_adres, :provider, :browser, :datum_tijd, :referer)";
    
    $stmt = $conn->prepare($sql);
    $stmt->execute([
        ':land' => $land,
        ':ip_adres' => $ip_adres,
        ':provider' => $provider,
        ':browser' => $browser,
        ':datum_tijd' => $datum_tijd,
        ':referer' => $referer
    ]);
}

function getBezoekers($land = '', $maand = '') {
    global $conn;

    $sql = "SELECT * FROM bezoekers WHERE 1";
    $params = [];

    if (!empty($land)) {
        $sql .= " AND land = :land";
        $params[':land'] = $land;
    }

    if (!empty($maand)) {
        $sql .= " AND MONTH(datum_tijd) = :maand";
        $params[':maand'] = $maand;
    }

    $sql .= " ORDER BY datum_tijd DESC";

    $stmt = $conn->prepare($sql);
    $stmt->execute($params);

    return $stmt->fetchAll(PDO::FETCH_ASSOC);
}

function getLanden() {
    global $conn;

    $sql = "SELECT DISTINCT land FROM bezoekers ORDER BY land";
    $stmt = $conn->prepare($sql);
    $stmt->execute();

    return $stmt->fetchAll(PDO::FETCH_ASSOC);
}