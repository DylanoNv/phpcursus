<?php
// Dylano Nietveld
// edit.php - optie aanpassen

require_once __DIR__ . "/db.php";

$id = (int)($_GET["id"] ?? 0);

if ($id <= 0) {
    header("Location: index.php");
    exit;
}

$stmt = $pdo->prepare("SELECT * FROM optie WHERE id = ?");
$stmt->execute([$id]);
$optie = $stmt->fetch();

if (!$optie) {
    header("Location: index.php");
    exit;
}

$fout = "";
$tekst = $optie["optie"];

if ($_SERVER["REQUEST_METHOD"] === "POST") {
    $tekst = trim($_POST["optie"] ?? "");

    if ($tekst === "") {
        $fout = "Vul een optie in.";
    } else {
        $stmt = $pdo->prepare("UPDATE optie SET optie = ? WHERE id = ?");
        $stmt->execute([$tekst, $id]);

        header("Location: index.php");
        exit;
    }
}
?>
<!doctype html>
<html lang="nl">
<head>
    <meta charset="utf-8">
    <title>Optie aanpassen</title>
</head>
<body>

    <h1>Optie aanpassen</h1>

    <?php if ($fout !== ""): ?>
        <p><?php echo htmlspecialchars($fout); ?></p>
    <?php endif; ?>

    <form method="post">
        <label>Optie</label><br>
        <input type="text" name="optie" value="<?php echo htmlspecialchars($tekst); ?>"><br><br>
        <button type="submit">Opslaan</button>
    </form>

    <p><a href="index.php">Terug naar poll</a></p>

</body>
</html>