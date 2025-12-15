<!DOCTYPE html>
<html lang="nl">
<head>
    <meta charset="UTF-8">
    <title>Opdracht 4.8 9015493</title>
</head>
<body>
    <h1>Opdracht 4.8 (scooter en stemmen)</h1>

    <form method="post">
        <label>Leeftijd:</label>
        <input type="number" name="leeftijd" required>
        <br><br>

        <label>
            <input type="checkbox" name="stempas" value="1">
            Ik heb een stempas ontvangen
        </label>
        <br><br>

        <button type="submit">Check</button>
    </form>

    <?php
    if ($_SERVER["REQUEST_METHOD"] === "POST") {
        $leeftijd = (int)$_POST["leeftijd"];
        $heeftStempas = isset($_POST["stempas"]); // true/false

        // scooter
        if ($leeftijd >= 16) {
            echo "<p>Scooter rijbewijs: <b>mag</b> ✅</p>";
        } else {
            echo "<p>Scooter rijbewijs: <b>mag niet</b> ❌</p>";
        }

        // stemmen
        if ($leeftijd >= 18 && $heeftStempas) {
            echo "<p>Stemmen: <b>mag</b> ✅</p>";
        } else {
            echo "<p>Stemmen: <b>mag niet</b> ❌</p>";

            if ($leeftijd >= 18 && !$heeftStempas) {
                echo "<p>(Je bent 18+, maar zonder stempas mag je volgens de opdracht niet stemmen.)</p>";
            }
        }
    }
    ?>
</body>
</html>