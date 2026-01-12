<?php
session_start();

// sessie teller
if (!isset($_SESSION['aantal'])) {
    $_SESSION['aantal'] = 0;
}
$_SESSION['aantal']++;

// cookie teller
if (!isset($_COOKIE['totaal'])) {
    setcookie("totaal", 1, time() + 86400 * 30);
    $totaal = 1;
} else {
    $totaal = $_COOKIE['totaal'] + 1;
    setcookie("totaal", $totaal, time() + 86400 * 30);
}
?>

Deze pagina heb je al <?php echo $_SESSION['aantal']; ?> keer bekeken
voordat de internet browser werd afgesloten.<br>

In totaal heb je deze pagina al <?php echo $totaal; ?> keer bekeken.