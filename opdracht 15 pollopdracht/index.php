<?php
// Dylano Nietveld
// index.php - poll stemmen en uitslag tonen

require_once __DIR__ . "/db.php";

if ($_SERVER["REQUEST_METHOD"] === "POST" && isset($_POST["optie"])) {
    $id = (int) $_POST["optie"];

    $stmt = $pdo->prepare("UPDATE optie SET stemmen = stemmen + 1 WHERE id = ?");
    $stmt->execute([$id]);

    header("Location: index.php");
    exit;
}

$poll = $pdo->query("SELECT * FROM poll WHERE id = 1")->fetch();
$opties = $pdo->query("SELECT * FROM optie WHERE poll = 1")->fetchAll();

$totaalStemmen = 0;
foreach ($opties as $optie) {
    $totaalStemmen += $optie["stemmen"];
}
?>
<!doctype html>
<html lang="nl">
<head>
    <meta charset="utf-8">
    <title>Poll</title>
    <style>
        table { border-collapse: collapse; margin-top: 20px; }
        th, td { border: 1px solid black; padding: 8px; }
    </style>
</head>
<body>

    <h1>Stelling van de maand: "<?php echo htmlspecialchars($poll["vraag"]); ?>"</h1>

    <form method="post">
        <?php foreach ($opties as $optie): ?>
            <p>
                <label>
                    <input type="radio" name="optie" value="<?php echo $optie["id"]; ?>" required>
                    <?php echo htmlspecialchars($optie["optie"]); ?>
                </label>
            </p>
        <?php endforeach; ?>
        <button type="submit">Verzenden</button>
    </form>

    <h2>Uitslag</h2>
    <p>Aantal stemmen: <?php echo $totaalStemmen; ?></p>

    <table>
        <tr>
            <th>Optie</th>
            <th>Stemmen</th>
            <th>Percentage</th>
            <th>Wijzig</th>
            <th>Verwijder</th>
        </tr>
        <?php foreach ($opties as $optie): ?>
            <tr>
                <td><?php echo htmlspecialchars($optie["optie"]); ?></td>
                <td><?php echo $optie["stemmen"]; ?></td>
                <td>
                    <?php
                    if ($totaalStemmen > 0) {
                        echo round(($optie["stemmen"] / $totaalStemmen) * 100, 1) . "%";
                    } else {
                        echo "0%";
                    }
                    ?>
                </td>
                <td><a href="edit.php?id=<?php echo $optie["id"]; ?>">Wijzig</a></td>
                <td><a href="delete.php?id=<?php echo $optie["id"]; ?>" onclick="return confirm('Weet je zeker dat je deze optie wilt verwijderen?')">Verwijder</a></td>
            </tr>
        <?php endforeach; ?>
    </table>

    <p><a href="beheer.php">Nieuwe optie toevoegen</a></p>

</body>
</html>