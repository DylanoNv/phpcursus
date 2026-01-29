<?php
require_once "database.php";

$sql = "SELECT id, merk, model, prijs FROM fietsen ORDER BY id";

$stmt = $db->prepare($sql);
$stmt->execute();

// resultaten ophalen
$fietsen = $stmt->fetchAll(PDO::FETCH_ASSOC);
?>
<!DOCTYPE html>
<html lang="nl">
<head>
    <meta charset="UTF-8">
    <title>Opdracht 1 H9 9015493</title>
    <style>
        table { border-collapse: collapse; width: 600px; }
        th, td { border: 1px solid #000; padding: 6px; }
    </style>
</head>
<body>

<h1>Opdracht 1 9015493</h1>

<?php if (count($fietsen) === 0): ?>
    <p>Geen fietsen gevonden.</p>
<?php else: ?>
    <table>
        <tr>
            <th>ID</th>
            <th>Merk</th>
            <th>Model</th>
            <th>Prijs</th>
        </tr>

        <?php foreach ($fietsen as $fiets): ?>
            <tr>
                <td><?= htmlspecialchars($fiets["id"]) ?></td>
                <td><?= htmlspecialchars($fiets["merk"]) ?></td>
                <td><?= htmlspecialchars($fiets["model"]) ?></td>
                <td>€ <?= number_format((float)$fiets["prijs"], 2, ",", ".") ?></td>
            </tr>
        <?php endforeach; ?>
    </table>
<?php endif; ?>

</body>
</html>