<?php
// auteur: Dylano Nietveld
// functie: tip een vriend

error_reporting(E_ALL);
ini_set('display_errors', 1);

session_start();
require_once 'functions.php';

if (!isset($_GET['id'])) {
    header("Location: index.php");
    exit();
}

$id = $_GET['id'];
$bericht = getBerichtById($id);

if (!$bericht) {
    header("Location: index.php");
    exit();
}

if (isset($_POST['verstuur'])) {
    $naam = $_POST['naam'];
    $email = $_POST['email'];

    $melding = "Tip verzonden naar " . htmlspecialchars($email);
}
?>

<!DOCTYPE html>
<html lang="nl">
<head>
    <meta charset="UTF-8">
    <title>Tip een vriend</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <h1>Tip een vriend</h1>

    <p>Je tipt het bericht: <strong><?php echo htmlspecialchars($bericht['titel']); ?></strong></p>

    <?php if (isset($melding)): ?>
        <p><?php echo $melding; ?></p>
    <?php endif; ?>

    <form method="post">
        <label>Jouw naam:</label><br>
        <input type="text" name="naam" required><br><br>

        <label>Email van vriend:</label><br>
        <input type="email" name="email" required><br><br>

        <button type="submit" name="verstuur">Tip versturen</button>
    </form>

    <br>
    <a href="bericht.php?id=<?php echo $bericht['id']; ?>">Terug naar bericht</a>
</body>
</html>