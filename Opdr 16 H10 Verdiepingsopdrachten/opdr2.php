<?php
//Dylano Nietveld
//gegevens uit http user halen

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


$userAgent = $_SERVER['HTTP_USER_AGENT'];
echo "HTTP-USER-AGENT: " . $userAgent . "<br>";

$browserInfo = getBrowserInfo($userAgent);
echo "Browser: " . $browserInfo . "<br>";

$operatingSystem = getOperatingSystem($userAgent);
echo "Besturingssysteem: " . $operatingSystem . "<br>";

?>