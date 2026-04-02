<?php
// Dylano Nietveld - crud toets
// edit.php - bestemming aanpassen

require_once __DIR__ . "/db.php";

$id = trim($_GET["id"] ?? "");
if ($id === "") {
    header("Location: index.php");
    exit;
}

$stmt = $pdo->prepare("SELECT * FROM bestemming WHERE idbestemming = ?");
$stmt->execute([$id]);
$bestemming = $stmt->fetch();

if (!$bestemming) {
    header("Location: index.php");
    exit;
}

$errors = [];
$idbestemming = $bestemming["idbestemming"];
$plaats = $bestemming["plaats"];
$land = $bestemming["land"];
$werelddeel = $bestemming["werelddeel"];

if ($_SERVER["REQUEST_METHOD"] === "POST") {
    $nieuwidbestemming = trim($_POST["idbestemming"] ?? "");
    $plaats = trim($_POST["plaats"] ?? "");
    $land = trim($_POST["land"] ?? "");
    $werelddeel = trim($_POST["werelddeel"] ?? "");

    if ($nieuwidbestemming === "") $errors[] = "ID bestemming is verplicht.";
    if ($plaats === "") $errors[] = "Plaats is verplicht.";
    if ($land === "") $errors[] = "Land is verplicht.";
    if ($werelddeel === "") $errors[] = "Werelddeel is verplicht.";

    if (empty($errors)) {
        $stmt = $pdo->prepare("UPDATE bestemming SET idbestemming = ?, plaats = ?, land = ?, werelddeel = ? WHERE idbestemming = ?");
        $stmt->execute([$nieuwidbestemming, $plaats, $land, $werelddeel, $id]);
        header("Location: index.php");
        exit;
    }
}
?>
<!doctype html>
<html lang="nl">
<head>
    <meta charset="utf-8">
    <title>Bestemming aanpassen</title>
</head>
<body>
    <h1>Bestemming aanpassen</h1>

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