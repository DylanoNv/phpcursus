<?php
// auteur: Dylano Nietveld
// functie: pagina na inloggen met 2fa update

require_once "config.php";

if (!isset($_SESSION['user_id']) || !isset($_SESSION['twofa_ok'])) {
    header("Location: login.php");
    exit;
}
?>

<!DOCTYPE html>
<html lang="nl">
<head>
    <meta charset="UTF-8">
    <title>Account pagina</title>
</head>
<body>
    <h1>Welkom</h1>
    <p>Je bent ingelogd als: <strong><?php echo htmlspecialchars($_SESSION['username']); ?></strong></p>
    <p>Je bent succesvol ingelogd met 2FA.</p>

    <a href="logout.php">Uitloggen</a>
</body>
</html>