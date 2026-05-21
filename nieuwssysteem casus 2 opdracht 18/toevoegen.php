<?php
// auteur: Dylano Nietveld
// functie: nieuwsbericht toevoegen

session_start();
require_once 'functions.php';

if (!isAdmin()) {
    header("Location: index.php");
    exit();
}

$categorieen = getCategorieen();

if (isset($_POST['toevoegen'])) {
    $titel = $_POST['titel'];
    $inhoud = $_POST['inhoud'];
    $categorieId = $_POST['categorie_id'];

    if (voegBerichtToe($titel, $inhoud, $categorieId)) {
        header("Location: beheer.php");
        exit();
    } else {
        $fout = "Toevoegen mislukt";
    }
}
?>

<!DOCTYPE html>
<html lang="nl">
<head>
    <meta charset="UTF-8">
    <title>Nieuwsbericht toevoegen</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <h1>Nieuwsbericht toevoegen</h1>

    <?php if (isset($fout)) echo "<p>$fout</p>"; ?>

    <form method="post">
        <label>Titel:</label><br>
        <input type="text" name="titel" required><br><br>

        <label>Inhoud:</label><br>
        <textarea name="inhoud" required></textarea><br><br>

        <label>Categorie:</label><br>
        <select name="categorie_id" required>
            <?php foreach ($categorieen as $categorie): ?>
                <option value="<?php echo $categorie['id']; ?>">
                    <?php echo htmlspecialchars($categorie['naam']); ?>
                </option>
            <?php endforeach; ?>
        </select><br><br>

        <button type="submit" name="toevoegen">Toevoegen</button>
    </form>

    <br>
    <a href="beheer.php">Terug naar beheer</a>
</body>
</html>