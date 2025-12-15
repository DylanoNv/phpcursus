<!DOCTYPE html>
<html lang="nl">
<head>
    <meta charset="UTF-8">
    <title>Opdracht 4.6 9015493</title>
</head>
<body>
    <h1>Opdracht 4.6 (Airco)</h1>

    <p>Huidige tijd: <b><?php echo date("H:i"); ?></b></p>

    <form method="post">
        <label>Temperatuur (°C):</label>
        <input type="number" step="0.1" name="temp" required>
        <br><br>
        <label>Luchtvochtigheid (%):</label>
        <input type="number" step="0.1" name="lv" required>
        <br><br>
        <button type="submit">Check Airco</button>
    </form>

    <?php
    if ($_SERVER["REQUEST_METHOD"] === "POST") {
        $temp = (float)$_POST["temp"];
        $lv = (float)$_POST["lv"];

        $uur = (int)date("H"); // 0-23

        $aircoUit = ($uur >= 17) || ($temp < 20 && $lv < 85);

        if ($aircoUit) {
            echo "<p><b>Airco: UIT</b></p>";
        } else {
            echo "<p><b>Airco: AAN</b></p>";
        }

        echo "<p>Temperatuur: $temp °C<br>Luchtvochtigheid: $lv %</p>";
    }
    ?>
</body>
</html>