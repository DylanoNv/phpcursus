<?php
// auteur: Dylano Nietveld
// functie: nieuwsbericht lezen

session_start();
require_once 'functions.php';

if (!isset($_GET['id'])) {
    header("Location: index.php");
    exit();
}

$id = $_GET['id'];

verhoogGelezen($id);

$bericht = getBerichtById($id);

if (!$bericht) {
    header("Location: index.php");
    exit();
}
?>

<!DOCTYPE html>
<html lang="nl">
<head>
    <meta charset="UTF-8">
    <title><?php echo htmlspecialchars($bericht['titel']); ?></title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <a href="index.php">Terug naar overzicht</a>

    <h1><?php echo htmlspecialchars($bericht['titel']); ?></h1>

    <p><strong>Categorie:</strong> <?php echo htmlspecialchars($bericht['categorie_naam']); ?></p>
    <p><strong>Datum:</strong> <?php echo $bericht['datum']; ?></p>
    <p><strong>Gelezen:</strong> <?php echo $bericht['gelezen']; ?> keer</p>

    <p><?php echo nl2br(htmlspecialchars($bericht['inhoud'])); ?></p>

    <br>
    <a href="tip.php?id=<?php echo $bericht['id']; ?>">Tip een vriend</a>
</body>
</html>