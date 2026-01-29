<?php
try {
    $db = new PDO("mysql:host=localhost;dbname=fietsenmaker;charset=utf8mb4", "root", "");
    $db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
} catch (PDOException $e) {
    die("Er is een databasefout");
}

$sql = "SELECT * FROM fietsen";
$stmt = $db->prepare($sql);
$stmt->execute();
$fietsen = $stmt->fetchAll(PDO::FETCH_ASSOC);
?>
<!DOCTYPE html>
<html lang="nl">
<head>
    <meta charset="UTF-8">
    <title>Opdracht 2 9015493</title>
</head>
<body>
<h1>Fietsen</h1>

<table border="1">
    <tr>
        <th>ID</th>
        <th>Merk</th>
        <th>Model</th>
        <th>Prijs</th>
    </tr>
    <?php foreach ($fietsen as $fiets): ?>
        <tr>
            <td><?= $fiets['id'] ?></td>
            <td><?= $fiets['merk'] ?></td>
            <td><?= $fiets['model'] ?></td>
            <td>€ <?= number_format($fiets['prijs'], 2, ',', '.') ?></td>
        </tr>
    <?php endforeach; ?>
</table>

</body>
</html>
