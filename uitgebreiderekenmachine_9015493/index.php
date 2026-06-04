<?php
// Dylano Nietveld
// Uitgebreide rekenmachine

require_once 'functions.php';

$resultaat = "";
$invoer = "";
$afronding = 2;

if (isset($_POST['bereken'])) {
    $invoer = $_POST['invoer'];
    $afronding = $_POST['afronding'];

    $resultaat = bereken($invoer, $afronding);

    if ($resultaat !== "Ongeldige invoer" && $resultaat !== "Fout in berekening") {
        slaBerekeningOp($invoer, $resultaat);
    }
}

$berekeningen = getBerekeningen();
?>

<!DOCTYPE html>
<html lang="nl">
<head>
    <meta charset="UTF-8">
    <title>Uitgebreide Rekenmachine</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>

<h1>Uitgebreide Rekenmachine</h1>

<form method="post">
    <label>Berekening:</label><br>
    <input type="text" name="invoer" value="<?php echo htmlspecialchars($invoer); ?>" placeholder="Bijv: 3 + 3 - 2 of sqrt(25) of 2^3" required>

    <br><br>

    <label>Afronden op aantal decimalen:</label><br>
    <input type="number" name="afronding" value="<?php echo htmlspecialchars($afronding); ?>" min="0" max="10">

    <br><br>

    <button type="submit" name="bereken">Bereken</button>
</form>

<?php if ($resultaat !== ""): ?>
    <div class="resultaat">
        <h2>Resultaat:</h2>
        <p><?php echo htmlspecialchars($resultaat); ?></p>
    </div>
<?php endif; ?>

<h2>Voorbeelden</h2>
<ul>
    <li>Optellen: 5 + 3</li>
    <li>Aftrekken: 10 - 4</li>
    <li>Vermenigvuldigen: 6 * 2</li>
    <li>Delen: 10 / 2</li>
    <li>Macht: 2^3</li>
    <li>Modulo: 10 % 3</li>
    <li>Wortel: sqrt(25)</li>
    <li>Meerdere bewerkingen: 3 + 3 - 2</li>
</ul>

<h2>Opgeslagen berekeningen</h2>

<table>
    <tr>
        <th>ID</th>
        <th>Invoer</th>
        <th>Resultaat</th>
        <th>Datum/tijd</th>
    </tr>

    <?php foreach ($berekeningen as $berekening): ?>
        <tr>
            <td><?php echo $berekening['id']; ?></td>
            <td><?php echo htmlspecialchars($berekening['invoer']); ?></td>
            <td><?php echo htmlspecialchars($berekening['resultaat']); ?></td>
            <td><?php echo $berekening['datum_tijd']; ?></td>
        </tr>
    <?php endforeach; ?>
</table>

</body>
</html>