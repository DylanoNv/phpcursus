<?php
session_start();
require_once 'functions.php';

if (!isLoggedIn()) {
    header("Location: login.php");
    exit();
}

$ziekmeldingen = getZiekmeldingen();
?>

<!DOCTYPE html>
<html lang="nl">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Ziekmeldingen</title>
</head>
<body>
    <h1>Overzicht ziekmeldingen</h1>

    <p>Welkom, <?php echo $_SESSION['user']['username']; ?> (<?php echo $_SESSION['user']['role']; ?>)</p>
    <a href="logout.php">Logout</a>
    <br><br>

    <?php if ($_SESSION['user']['role'] == 'leraar'): ?>
        <a href="toevoegen.php">Nieuwe ziekmelding toevoegen</a>
        <br><br>
    <?php endif; ?>

    <table border="1" cellpadding="10">
        <tr>
            <th>ID</th>
            <th>Docent naam</th>
            <th>Reden</th>
            <th>Datum</th>
            <?php if ($_SESSION['user']['role'] == 'leraar'): ?>
                <th>Acties</th>
            <?php endif; ?>
        </tr>

        <?php foreach ($ziekmeldingen as $melding): ?>
            <tr>
                <td><?php echo $melding['id']; ?></td>
                <td><?php echo $melding['docent_naam']; ?></td>
                <td><?php echo $melding['reden']; ?></td>
                <td><?php echo $melding['datum']; ?></td>

                <?php if ($_SESSION['user']['role'] == 'leraar'): ?>
                    <td>
                        <a href="wijzigen.php?id=<?php echo $melding['id']; ?>">Wijzigen</a>
                        <a href="verwijderen.php?id=<?php echo $melding['id']; ?>">Verwijderen</a>
                    </td>
                <?php endif; ?>
            </tr>
        <?php endforeach; ?>
    </table>
</body>
</html>