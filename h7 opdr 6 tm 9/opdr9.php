<?php
$tekst = "";
$keuze = "";
$output = "";

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $tekst = $_POST['tekst'] ?? '';
    $keuze = $_POST['keuze'] ?? '';

    if ($keuze === 'upper') {
        $output = strtoupper($tekst);
    } elseif ($keuze === 'lower') {
        $output = strtolower($tekst);
    } elseif ($keuze === 'ucfirst') {
        $output = ucfirst(strtolower($tekst));
    } elseif ($keuze === 'ucwords') {
        $output = ucwords(strtolower($tekst));
    }
}
?>
<!DOCTYPE html>
<html lang="nl">
<head>
    <meta charset="UTF-8">
    <title>php h7 opdracht 9 dylano nietveld</title>
</head>
<body>
    <form method="post">
        <label for="tekst">Tekst:</label>
        <input type="text" name="tekst" id="tekst" value="<?= htmlspecialchars($tekst) ?>" required>
        <br><br>

        <input type="radio" name="keuze" value="upper" id="upper" <?= $keuze==='upper'?'checked':''; ?>>
        <label for="upper">In hoofdletters</label><br>

        <input type="radio" name="keuze" value="lower" id="lower" <?= $keuze==='lower'?'checked':''; ?>>
        <label for="lower">In kleine letters</label><br>

        <input type="radio" name="keuze" value="ucfirst" id="ucfirst" <?= $keuze==='ucfirst'?'checked':''; ?>>
        <label for="ucfirst">Eerste letter van zin hoofdletter</label><br>

        <input type="radio" name="keuze" value="ucwords" id="ucwords" <?= $keuze==='ucwords'?'checked':''; ?>>
        <label for="ucwords">Eerste letter van elk woord hoofdletter</label><br><br>

        <button type="submit">Weergeven</button>
    </form>

    <?php if ($output !== ""): ?>
        <p><?= htmlspecialchars($output) ?></p>
    <?php endif; ?>
</body>
</html>