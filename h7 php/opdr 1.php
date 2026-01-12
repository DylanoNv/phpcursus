<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>BTW Rekenmachine</title>
</head>
<body>
    <form method="post">
        Bedrag exclusief BTW:
        <input type="number" name="bedrag" step="0.01" required><br><br>

        <input type="radio" name="btw" value="0.09" required> Laag (9%)<br>
        <input type="radio" name="btw" value="0.21" required> Hoog (21%)<br><br>

        <button type="submit">Uitrekenen</button>
    </form>

    <?php
    if ($_POST) {
        $bedrag = $_POST['bedrag'];
        $btw = $_POST['btw'];

        $totaal = $bedrag * (1 + $btw);
        $percentage = $btw * 100;

        echo "<p>Bedrag inclusief $percentage% BTW: €  " . number_format($totaal, 2, ',', '.') . "</p>";
    }
    ?>
</body>
</html>