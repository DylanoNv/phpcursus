<?php
// Dylano Nietveld
// beheer.php - nieuwe optie toevoegen

require_once __DIR__ . "/db.php";

$fout = "";
$nieuweOptie = "";

if ($_SERVER["REQUEST_METHOD"] === "POST") {
    $nieuweOptie = trim($_POST["optie"] ?? "");

    if ($nieuweOptie === "") {
        $fout = "Vul een optie in.";
    } else {
        $stmt = $pdo->prepare("INSERT INTO optie (poll, optie, stemmen) VALUES (1, ?, 0)");
        $stmt->execute([$nieuweOptie]);

        header("Location: index.php");
        exit;
    }
}
?>
<!doctype html>
<html lang="nl">
<head>
    <meta charset="utf-8">
    <title>Optie toevoegen</title>
</head>
<body>

    <h1>Nieuwe optie toevoegen</h1>

    <?php if ($fout !== ""): ?>
        <p><?php echo htmlspecialchars($fout); ?></p>
    <?php endif; ?>

    <form method="post">
        <label>Nieuwe optie</label><br>
        <input type="text" name="optie" value="<?php echo htmlspecialchars($nieuweOptie); ?>"><br><br>
        <button type="submit">Opslaan</button>
    </form>

    <p><a href="index.php">Terug naar poll</a></p>

</body>
</html>