<?php
// auteur: Dylano Nietveld
// functie: pagina na inloggen

require_once "config.php";

if (!isset($_SESSION['user_id'])) {
    header("Location: login.php");
    exit;
}
?>

<!DOCTYPE html>
<html lang="nl">
<head>
    <meta charset="UTF-8">
    <title>account pagina</title>
</head>
<body>
    <h1>Welkom</h1>
    <p>Je bent ingelogd als: <strong><?php echo htmlspecialchars($_SESSION['username']); ?></strong></p>

    <p>Dit is een account pagina.</p>

    <a href="logout.php">Uitloggen</a>
</body>
</html>