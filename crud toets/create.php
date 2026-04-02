<?php
// Dylano Nietveld - opdr 11 CRUD
// create.php - fiets adden

require_once __DIR__ . "/db.php";

$errors = [];
$merk = "";
$type = "";
$prijs = "";

if ($_SERVER["REQUEST_METHOD"] === "POST") {
    $merk = trim($_POST["merk"] ?? "");
    $type = trim($_POST["type"] ?? "");
    $prijs = trim($_POST["prijs"] ?? "");

    if ($merk === "") $errors[] = "Merk is verplicht.";
    if ($type === "") $errors[] = "Type is verplicht.";
    if ($prijs === "" || !is_numeric($prijs)) $errors[] = "Prijs moet een getal zijn.";

    if (empty($errors)) {
        $stmt = $pdo->prepare("INSERT INTO fietsen (merk, type, prijs) VALUES (?, ?, ?)");
        $stmt->execute([$merk, $type, $prijs]);
        header("Location: index.php");
        exit;
    }
}
?>
<!doctype html>
<html lang="nl">
<head>
    <meta charset="utf-8">
    <title>Fiets toevoegen</title>
</head>
<body>
    <h1>Fiets toevoegen</h1>

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