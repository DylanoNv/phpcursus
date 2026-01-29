<?php
require_once "database.php";

$stmt = $db->prepare("SELECT * FROM fietsen");
$stmt->execute();
$fietsen = $stmt->fetchAll(PDO::FETCH_ASSOC);
?>
<!DOCTYPE html>
<html lang="nl">
<head>
  <meta charset="UTF-8">
  <title>Opdracht 3</title>
</head>
<body>
  <h1>Opdracht 3 9015493</h1>

  <ul>
    <?php foreach ($fietsen as $fiets): ?>
      <li><?= $fiets['merk'] ?> <?= $fiets['model'] ?> (€<?= number_format($fiets['prijs'], 2, ',', '.') ?>)</li>
    <?php endforeach; ?>
  </ul>
</body>
</html>