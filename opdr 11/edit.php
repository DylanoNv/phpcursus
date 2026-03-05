<?php
// Dylano Nietveld - opdr 11 CRUD
// edit.php - fiets aanpassen

require_once __DIR__ . "/db.php";

$id = (int)($_GET["id"] ?? 0);
if ($id <= 0) {
    header("Location: index.php");
    exit;
}

$stmt = $pdo->prepare("SELECT * FROM fietsen WHERE id = ?");
$stmt->execute([$id]);
$fiets = $stmt->fetch();

if (!$fiets) {
    header("Location: index.php");
    exit;
}

$errors = [];
$merk = $fiets["merk"];
$type = $fiets["type"];
$prijs = $fiets["prijs"];

if ($_SERVER["REQUEST_METHOD"] === "POST") {
    $merk = trim($_POST["merk"] ?? "");
    $type = trim($_POST["type"] ?? "");
    $prijs = trim($_POST["prijs"] ?? "");

    if ($merk === "") $errors[] = "Merk is verplicht.";
    if ($type === "") $errors[] = "Type is verplicht.";
    if ($prijs === "" || !is_numeric($prijs)) $errors[] = "Prijs moet een getal zijn.";

    if (empty($errors)) {
        $stmt = $pdo->prepare("UPDATE fietsen SET merk = ?, type = ?, prijs = ? WHERE id = ?");
        $stmt->execute([$merk, $type, $prijs, $id]);
        header("Location: index.php");
        exit;
    }
}
?>
<!doctype html>
<html lang="nl">
<head>
    <meta charset="utf-8">
    <title>Fiets aanpassen</title>
</head>
<body>
    <h1>Fiets aanpassen</h1>

    <?php if (!empty($errors)): ?>
        <ul>
            <?php foreach ($errors as $e): ?>
                <li><?= htmlspecialchars($e) ?></li>
            <?php endforeach; ?>
        </ul>
    <?php endif; ?>

    <form method="post">
        <p>
            <label>Merk<br>
                <input type="text" name="merk" value="<?= htmlspecialchars($merk) ?>">
            </label>
        </p>
        <p>
            <label>Type<br>
                <input type="text" name="type" value="<?= htmlspecialchars($type) ?>">
            </label>
        </p>
        <p>
            <label>Prijs<br>
                <input type="text" name="prijs" value="<?= htmlspecialchars($prijs) ?>">
            </label>
        </p>
        <button type="submit">Opslaan</button>
        <a href="index.php">Annuleren</a>
    </form>
</body>
</html>