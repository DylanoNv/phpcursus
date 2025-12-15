<!DOCTYPE html>
<html lang="nl">
<head>
    <meta charset="UTF-8">
    <title>Opdracht 4.7 9015493</title>
</head>
<body>
    <h1>Opdracht 4.7 (telefoon)</h1>

    <form method="post">
        <label>Hoeveel spaargeld heb je (€)?</label>
        <input type="number" step="0.01" name="spaargeld" required>
        <button type="submit">Check</button>
    </form>

    <?php
    if ($_SERVER["REQUEST_METHOD"] === "POST") {
        $spaargeld = (float)$_POST["spaargeld"];
        $prijs = 1000;

        if ($spaargeld < $prijs) {
            $tekort = $prijs - $spaargeld;

            if ($tekort > 250) {
                echo "<p>Je komt <b>€" . number_format($tekort, 2) . "</b> tekort. Zoek beter een baantje.</p>";
            } else {
                echo "<p>Je komt <b>€" . number_format($tekort, 2) . "</b> tekort. Je bent er bijna.</p>";
            }
        } else {
            $over = $spaargeld - $prijs;
            echo "<p>Je kan de telefoon kopen ✅</p>";
            echo "<p>Je houdt <b>€" . number_format($over, 2) . "</b> over voor een hoesje.</p>";
        }
    }
    ?>
</body>
</html>