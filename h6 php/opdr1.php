<?php
// Gemaakt door Dylano Nietveld 9015493
session_start();

if (!isset($_SESSION['aantal'])) {
    $_SESSION['aantal'] = 0;
}

$_SESSION['aantal']++;
?>

Deze pagina heb je al <?php echo $_SESSION['aantal']; ?> keer bekeken
voordat je de internet browser hebt afgesloten.