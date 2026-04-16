<?php
session_start();
require_once 'functions.php';

if (!isLoggedIn()) {
    header("Location: login.php");
    exit();
}

if ($_SESSION['user']['role'] != 'leraar') {
    header("Location: index.php");
    exit();
}

if (!isset($_GET['id'])) {
    header("Location: index.php");
    exit();
}

$id = $_GET['id'];
$melding = getZiekmeldingById($id);

if (!$melding) {
    header("Location: index.php");
    exit();
}

if (isset($_POST['wijzigen'])) {
    $docent_naam = $_POST['docent_naam'];
    $reden = $_POST['reden'];
    $datum = $_POST['datum'];

    if (updateZiekmelding($id, $docent_naam, $reden, $datum)) {
        header("Location: index.php");
        exit();
    } else {
        $fout = "Wijzigen mislukt";
    }
}
?>

<!DOCTYPE html>
<html lang="nl">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Ziekmelding wijzigen</title>
</head>
<body>
    <h1>Ziekmelding wijzigen</h1>

    <?php if (isset($fout)) echo "<p>$fout</p>"; ?>

    <form method="post">
        <label>Docent naam:</label>
        <input type="text" name="docent_naam" required value="<?php echo $melding['docent_naam']; ?>"><br><br>

        <label>Reden:</label>
        <input type="text" name="reden" required value="<?php echo $melding['reden']; ?>"><br><br>

        <label>Datum:</label>
        <input type="date" name="datum" required value="<?php echo $melding['datum']; ?>"><br><br>

        <input type="submit" name="wijzigen" value="Wijzigen">
    </form>

    <br>
    <a href="index.php">Terug naar overzicht</a>
</body>
</html>