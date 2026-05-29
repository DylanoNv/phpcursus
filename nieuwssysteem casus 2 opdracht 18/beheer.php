<?php
// auteur: Dylano Nietveld
// functie: beheerpagina voor nieuwsberichten

session_start();
require_once 'functions.php';

if (!isAdmin()) {
    header("Location: index.php");
    exit();
}

$berichten = getBerichten();
?>

<!DOCTYPE html>
<html lang="nl">
<head>
    <meta charset="UTF-8">
    <title>Beheer nieuwsberichten</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <h1>Beheer nieuwsberichten</h1>

    <nav>
        <a href="index.php">Home</a>
        <a href="toevoegen.php">Nieuw bericht toevoegen</a>
        <a href="logout.php">Uitloggen</a>
    </nav>

    <br>

    <table border="1" cellpadding="10">
        <tr>
            <th>ID</th>
            <th>Titel</th>
            <th>Categorie</th>
            <th>Gelezen</th>
            <th>Acties</th>
        </tr>

        <?php foreach ($berichten as $bericht): ?>
            <tr>
                <td><?php echo $bericht['id']; ?></td>
                <td><?php echo htmlspecialchars($bericht['titel']); ?></td>
                <td><?php echo htmlspecialchars($bericht['categorie_naam']); ?></td>
                <td><?php echo $bericht['gelezen']; ?></td>
                <td>
                    <a href="bewerken.php?id=<?php echo $bericht['id']; ?>">Bewerken</a>
                    <a href="verwijderen.php?id=<?php echo $bericht['id']; ?>">Verwijderen</a>
                </td>
            </tr>
        <?php endforeach; ?>
    </table>
</body>
</html>