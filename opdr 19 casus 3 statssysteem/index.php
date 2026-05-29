<?php
// Dylano Nietveld
// Statistiekensysteem

require_once 'functions.php';

// registreert automatisch bezoeker bij openen van de pagina
registreerBezoeker();

$filterLand = $_GET['land'] ?? '';
$filterMaand = $_GET['maand'] ?? '';

$landen = getLanden();
$bezoekers = getBezoekers($filterLand, $filterMaand);
?>

<!DOCTYPE html>
<html lang="nl">
<head>
    <meta charset="UTF-8">
    <title>Statistiekensysteem</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>

<h1>Statistiekensysteem</h1>

<form method="get">
    <label>Filter op land:</label>
    <select name="land">
        <option value="">Alle landen</option>
        <?php foreach ($landen as $land): ?>
            <option value="<?php echo $land['land']; ?>" 
                <?php if ($filterLand == $land['land']) echo 'selected'; ?>>
                <?php echo $land['land']; ?>
            </option>
        <?php endforeach; ?>
    </select>

    <label>Filter op maand:</label>
    <select name="maand">
        <option value="">Alle maanden</option>
        <?php for ($i = 1; $i <= 12; $i++): ?>
            <option value="<?php echo $i; ?>" 
                <?php if ($filterMaand == $i) echo 'selected'; ?>>
                <?php echo $i; ?>
            </option>
        <?php endfor; ?>
    </select>

    <button type="submit">Filter</button>
    <a href="index.php">Reset</a>
</form>

<br>

<p>Aantal records: <?php echo count($bezoekers); ?></p>

<table border="1" cellpadding="8">
    <tr>
        <th>ID</th>
        <th>Land</th>
        <th>IP-adres</th>
        <th>Provider</th>
        <th>Browser</th>
        <th>Datum/tijd</th>
        <th>Referer</th>
    </tr>

    <?php foreach ($bezoekers as $bezoeker): ?>
        <tr>
            <td><?php echo $bezoeker['id']; ?></td>
            <td><?php echo $bezoeker['land']; ?></td>
            <td><?php echo $bezoeker['ip_adres']; ?></td>
            <td><?php echo $bezoeker['provider']; ?></td>
            <td><?php echo substr($bezoeker['browser'], 0, 40); ?></td>
            <td><?php echo $bezoeker['datum_tijd']; ?></td>
            <td><?php echo $bezoeker['referer']; ?></td>
        </tr>
    <?php endforeach; ?>
</table>

</body>
</html>