<?php
// auteur: Dylano Nietveld
// functie: nieuwsbericht bewerken

session_start();
require_once 'functions.php';

if (!isAdmin()) {
    header("Location: index.php");
    exit();
}

if (!isset($_GET['id'])) {
    header("Location: beheer.php");
    exit();
}

$id = $_GET['id'];
$bericht = getBerichtById($id);
$categorieen = getCategorieen();

if (!$bericht) {
    header("Location: beheer.php");
    exit();
}

if (isset($_POST['bewerken'])) {
    $titel = $_POST['titel'];
    $inhoud = $_POST['inhoud'];
    $categorieId = $_POST['categorie_id'];

    if (updateBericht($id, $titel, $inhoud, $categorieId)) {
        header("Location: beheer.php");
        exit();
    } else {
        $fout = "Bewerken mislukt";
    }
}
?>

<!DOCTYPE html>
<html lang="nl">
<head>
    <meta charset="UTF-8">
    <title>Nieuwsbericht bewerken</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <h1>Nieuwsbericht bewerken</h1>

    <?php if (isset($fout)) echo "<p>$fout</p>"; ?>

    <form method="post">
        <label>Titel:</label><br>
        <input type="text" name="titel" required value="<?php echo htmlspecialchars($bericht['titel']); ?>"><br><br>

        <label>Inhoud:</label><br>
        <textarea name="inhoud" required><?php echo htmlspecialchars($bericht['inhoud']); ?></textarea><br><br>

        <label>Categorie:</label><br>
        <select name="categorie_id" required>
            <?php foreach ($categorieen as $categorie): ?>
                <option value="<?php echo $categorie['id']; ?>" 
                    <?php if ($categorie['id'] == $bericht['categorie_id']) echo 'selected'; ?>>
                    <?php echo htmlspecialchars($categorie['naam']); ?>
                </option>
            <?php endforeach; ?>
        </select><br><br>

        <button type="submit" name="bewerken">Opslaan</button>
    </form>

    <br>
    <a href="beheer.php">Terug naar beheer</a>
</body>
</html>