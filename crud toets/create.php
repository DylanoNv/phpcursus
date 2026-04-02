<?php
// Dylano Nietveld - crud toets
// create.php - Bewerkt voor tabel bestemming in database reizen

require_once __DIR__ . "/db.php";

$errors = [];
$idbestemming = "";
$plaats = "";
$land = "";
$werelddeel = "";

if ($_SERVER["REQUEST_METHOD"] === "POST") {
    $idbestemming = trim($_POST["idbestemming"] ?? "");
    $plaats = trim($_POST["plaats"] ?? "");
    $land = trim($_POST["land"] ?? "");
    $werelddeel = trim($_POST["werelddeel"] ?? "");

    if ($idbestemming === "") $errors[] = "ID bestemming is verplicht.";
    if ($plaats === "") $errors[] = "Plaats is verplicht.";
    if ($land === "") $errors[] = "Land is verplicht.";
    if ($werelddeel === "") $errors[] = "Werelddeel is verplicht.";

    if (empty($errors)) {
        $stmt = $pdo->prepare("INSERT INTO bestemming (idbestemming, plaats, land, werelddeel) VALUES (?, ?, ?, ?)");
        $stmt->execute([$idbestemming, $plaats, $land, $werelddeel]);
        header("Location: index.php");
        exit;
    }
}
?>
<!doctype html>
<html lang="nl">
<head>
    <meta charset="utf-8">
    <title>Bestemming toevoegen</title>
</head>
<body>
    <h1>Bestemming toevoegen</h1>

    <?php if (!empty($errors)): ?>
        <ul>
            <?php foreach ($errors as $e): ?>
                <li><?= htmlspecialchars($e) ?></li>
            <?php endforeach; ?>
        </ul>
    <?php endif; ?>

    <form method="post">
        <p>
            <label>ID bestemming<br>
                <input type="text" name="idbestemming" value="<?= htmlspecialchars($idbestemming) ?>">
            </label>
        </p>
        <p>
            <label>Plaats<br>
                <input type="text" name="plaats" value="<?= htmlspecialchars($plaats) ?>">
            </label>
        </p>
        <p>
            <label>Land<br>
                <input type="text" name="land" value="<?= htmlspecialchars($land) ?>">
            </label>
        </p>
        <p>
            <label>Werelddeel<br>
                <input type="text" name="werelddeel" value="<?= htmlspecialchars($werelddeel) ?>">
            </label>
        </p>
        <button type="submit">Opslaan</button>
        <a href="index.php">Annuleren</a>
    </form>
</body>
</html>