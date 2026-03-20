<?php
// auteur: Dylano Nietveld
// functie: database connectie en 2FA functies

session_start();

$servername = "localhost";
$dbname = "studenten_login";
$username = "root";
$password = "";

try {
    $conn = new PDO("mysql:host=$servername;dbname=$dbname;charset=utf8", $username, $password);
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
} catch(PDOException $e) {
    die("Connectie mislukt: " . $e->getMessage());
}

function generateSecret($length = 16) {
    $characters = 'ABCDEFGHIJKLMNOPQRSTUVWXYZ234567';
    $secret = '';

    for ($i = 0; $i < $length; $i++) {
        $secret .= $characters[random_int(0, strlen($characters) - 1)];
    }

    return $secret;
}

function base32Decode($secret) {
    if (empty($secret)) {
        return '';
    }

    $base32chars = 'ABCDEFGHIJKLMNOPQRSTUVWXYZ234567';
    $base32charsFlipped = array_flip(str_split($base32chars));

    $paddingCharCount = substr_count($secret, '=');
    $allowedValues = [6, 4, 3, 1, 0];

    if (!in_array($paddingCharCount, $allowedValues)) {
        return false;
    }

    $secret = str_replace('=', '', $secret);
    $secret = strtoupper($secret);

    $binaryString = '';

    for ($i = 0; $i < strlen($secret); $i++) {
        if (!isset($base32charsFlipped[$secret[$i]])) {
            return false;
        }

        $binaryString .= str_pad(decbin($base32charsFlipped[$secret[$i]]), 5, '0', STR_PAD_LEFT);
    }

    $eightBits = str_split($binaryString, 8);
    $decoded = '';

    foreach ($eightBits as $bits) {
        if (strlen($bits) === 8) {
            $decoded .= chr(bindec($bits));
        }
    }

    return $decoded;
}

function getCode($secret, $timeSlice = null) {
    if ($timeSlice === null) {
        $timeSlice = floor(time() / 30);
    }

    $secretKey = base32Decode($secret);

    if ($secretKey === false) {
        return false;
    }

    $time = chr(0).chr(0).chr(0).chr(0).pack('N*', $timeSlice);
    $hm = hash_hmac('SHA1', $time, $secretKey, true);
    $offset = ord(substr($hm, -1)) & 0x0F;
    $hashPart = substr($hm, $offset, 4);
    $value = unpack('N', $hashPart)[1];
    $value = $value & 0x7FFFFFFF;
    $modulo = 1000000;

    return str_pad($value % $modulo, 6, '0', STR_PAD_LEFT);
}

function verifyCode($secret, $code, $discrepancy = 1) {
    $code = trim($code);

    for ($i = -$discrepancy; $i <= $discrepancy; $i++) {
        $calculatedCode = getCode($secret, floor(time() / 30) + $i);

        if ($calculatedCode === $code) {
            return true;
        }
    }

    return false;
}
?>