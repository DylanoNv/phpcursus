<?php
//Dylano Nietveld
//http user in db opslaan

function connectToDatabase() {
    $servername = "localhost";
    $username = "root";
    $password = "";
    $dbname = "webbrowser";

    // Create connectie
    $conn = new mysqli($servername, $username, $password, $dbname);

    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }
    return $conn;
}

function getBrowserInfo($userAgent) {
    if (strpos($userAgent, 'Firefox') !== false) {
        return 'Mozilla Firefox';
    } elseif (strpos($userAgent, 'Chrome') !== false) {
        return 'Google Chrome';
    } elseif (strpos($userAgent, 'Safari') !== false) {
        return 'Apple Safari';
    } elseif (strpos($userAgent, 'Edge') !== false) {
        return 'Microsoft Edge';
    } else {
        return 'Onbekende browser';
    }
}
function getOperatingSystem($userAgent) {
    if (strpos($userAgent, 'Windows NT 10.0') !== false) {
        return 'Windows 10';
    } elseif (strpos($userAgent, 'Windows NT 6.1') !== false) {
        return 'Windows 7';
    } elseif (strpos($userAgent, 'Mac OS X') !== false) {
        return 'Mac OS X';
    } elseif (strpos($userAgent, 'Linux') !== false) {
        return 'Linux';
    } else {
        return 'Onbesturingssysteem';
    }
}

$conn = connectToDatabase();
$userAgent = $_SERVER['HTTP_USER_AGENT'];
$browserInfo = getBrowserInfo($userAgent);
$operatingSystem = getOperatingSystem($userAgent);
$sql = "INSERT INTO opslaan (browser, os) VALUES ('$browserInfo', '$operatingSystem')";

if ($conn->query($sql) === TRUE) {
    echo "Gegevens succesvol opgeslagen in de database.";
} else {
    echo "Error: " . $sql . "<br>" . $conn->error;
}

$conn->close();

?>