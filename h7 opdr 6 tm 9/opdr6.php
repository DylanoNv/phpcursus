<?php
session_start();

if (!isset($_SESSION['cijfers'])) {
    $_SESSION['cijfers'] = [];
}

$fout = "";

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $cijfer = str_replace(',', '.', trim($_POST['cijfer'] ?? ''));

    if ($cijfer === '' || !is_numeric($cijfer)) {
        $fout = "Voer geldig cijfer in.";
    } else {
        $cijfer = (float)$cijfer;

        if ($cijfer < 1.0 || $cijfer > 10.0) {
            $fout = "Cijfer moet tussen 1,0 en 10,0 zijn.";
        } else {
            $_SESSION['cijfers'][] = $cijfer;
        }
    }
}

$aantal = count($_SESSION['cijfers']);
$gemiddelde = $aantal > 0 ? array_sum($_SESSION['cijfers']) / $aantal : 0;
?>
<!DOCTYPE html>
<html lang="nl">
<head>
    <meta charset="UTF-8">
    <title>php h7 opdracht 6 dylano nietveld</title>
</head>
<body>
    <form method="post">
        <label for="cijfer">Cijfer:</label>
        <input type="text" name="cijfer" id="cijfer" required>
        <button type="submit">Toevoegen</button>
    </form>

    <?php if ($fout !== ""): ?>
        <p><?= htmlspecialchars($fout) ?></p>
    <?php endif; ?>

    <p>Aantal ingevoerde cijfers: <?= $aantal ?></p>
    <p>Gemiddeld: <?= number_format($gemiddelde, 1, '.', '') ?></p>
</body>
</html>