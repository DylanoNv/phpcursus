<?php
// Dylano Nietveld - opdr 11 CRUD
// index.php - homepage

require_once __DIR__ . "/db.php";

$stmt = $pdo->query("SELECT * FROM fietsen ORDER BY id DESC");
$fietsen = $stmt->fetchAll();
?>
<!doctype html>
<html lang="nl">
<head>
    <meta charset="utf-8">
    <title>Fietsenshop</title>
    <style>
        table { border-collapse: collapse; }
        th, td { border: 1px solid #000; padding: 6px 10px; }
        th { background: #66ffcc; }
        td { background: #66ffcc; }
    </style>
</head>
<body>
    <h1>Fietsenshop</h1>

    <p><a href="create.php">Fiets toevoegen</a></p>

    <table>
        <thead>
            <tr>
                <th>Merk</th>
                <th>Type</th>
                <th>Prijs</th>
                <th>Verander</th>
                <th>Verwijder</th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($fietsen as $fiets): ?>
                <tr>
                    <td><?= htmlspecialchars($fiets["merk"]) ?></td>
                    <td><?= htmlspecialchars($fiets["type"]) ?></td>
                    <td><?= htmlspecialchars($fiets["prijs"]) ?></td>
                    <td><a href="edit.php?id=<?= $fiets["id"] ?>">Wijzig</a></td>
                    <td><a href="delete.php?id=<?= $fiets["id"] ?>" onclick="return confirm('Weet je zeker dat je de fiets wilt verwijderen?')">Verwijder</a></td>
                </tr>
            <?php endforeach; ?>
        </tbody>
    </table>
</body>
</html>