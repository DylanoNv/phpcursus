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

if (isset($_POST['toevoegen'])) {
    $docent_naam = $_POST['docent_naam'];
    $reden = $_POST['reden'];
    $datum = $_POST['datum'];

    if (insertZiekmelding($docent_naam, $reden, $datum)) {
        header("Location: index.php");
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
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Ziekmelding toevoegen</title>
</head>
<body>
    <h1>Ziekmelding toevoegen</h1>

    <?php if (isset($fout)) echo "<p>$fout</p>"; ?>

    <form method="post">
        <label>Docent naam:</label>
        <input type="text" name="docent_naam" required><br><br>

        <label>Reden:</label>
        <input type="text" name="reden" required><br><br>

        <label>Datum:</label>
        <input type="date" name="datum" required><br><br>

        <input type="submit" name="toevoegen" value="Toevoegen">
    </form>

    <br>
    <a href="index.php">Terug naar overzicht</a>
</body>
</html>