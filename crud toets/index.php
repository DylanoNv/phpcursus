<?php
// Dylano Nietveld - crud toets
// index.php - Bewerkt voor tabel bestemming in database reizen

require_once __DIR__ . "/db.php";

$stmt = $pdo->query("SELECT * FROM bestemming ORDER BY idbestemming DESC");
$bestemmingen = $stmt->fetchAll();
?>
<!doctype html>
<html lang="nl">
<head>
    <meta charset="utf-8">
    <title>Reizen</title>
    <style>
        table { border-collapse: collapse; }
        th, td { border: 1px solid #000; padding: 6px 10px; }
        th { background: #66ffcc; }
        td { background: #66ffcc; }
    </style>
</head>
<body>
    <h1>Reizen Dylano Nietveld crud toets</h1>

    <p><a href="create.php">Bestemming toevoegen</a></p>

    <table>
        <thead>
            <tr>
                <th>Plaats</th>
                <th>Land</th>
                <th>Werelddeel</th>
                <th>Wijzig</th>
                <th>Verwijder</th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($bestemmingen as $bestemming): ?>
                <tr>
                    <td><?= htmlspecialchars($bestemming["plaats"]) ?></td>
                    <td><?= htmlspecialchars($bestemming["land"]) ?></td>
                    <td><?= htmlspecialchars($bestemming["werelddeel"]) ?></td>
                    <td><a href="edit.php?id=<?= $bestemming["idbestemming"] ?>">Wijzig</a></td>
                    <td><a href="delete.php?id=<?= $bestemming["idbestemming"] ?>" onclick="return confirm('Weet je zeker dat je deze bestemming wilt verwijderen?')">Verwijder</a></td>
                </tr>
            <?php endforeach; ?>
        </tbody>
    </table>
</body>
</html>