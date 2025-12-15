<!DOCTYPE html>
<html lang="nl">
<head>
    <meta charset="UTF-8">
    <title>Opdracht 4.5 even of oneven 9015493</title>
</head>
<body>
    <h1>Opdracht 4.5 (even of oneven) </h1>

    <form method="post">
        <label>Vul een getal in:</label>
        <input type="number" name="getal" required>
        <button type="submit">Check</button>
    </form>

    <?php
    if ($_SERVER["REQUEST_METHOD"] === "POST") {
        $getal = (int)$_POST["getal"];

        if ($getal % 2 === 0) {
            echo "<p>$getal is <b>even</b>.</p>";
        } else {
            echo "<p>$getal is <b>oneven</b>.</p>";
        }
    }
    ?>
</body>
</html>