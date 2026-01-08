<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>opdr 4</title>
</head>
<body>
    
<form method="post">
    Prijs:
    <input type="number" name="prijs" step="0.01" required><br><br>

    Korting (%):
    <input type="number" name="korting" required><br><br>

    <button type="submit">Berekenen</button>
</form>

<?php
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $prijs = (float)$_POST['prijs'];
    $korting = (float)$_POST['korting'];

    $nieuwBedrag = $prijs - ($prijs * ($korting / 100));

    echo "<p>Prijs na korting: € " . number_format($nieuwBedrag, 2, ',', '.') . "</p>";
}
?>
</body>
</html>