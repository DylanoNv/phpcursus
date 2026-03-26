<?php
// database connectie
// auteur: Dylano Nietveld
$host = "localhost";
$dbname = "gastenboek";
$username = "root";
$password = "";

try {
    $pdo = new PDO("mysql:host=$host;dbname=$dbname;charset=utf8", $username, $password);
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
} catch (PDOException $e) {
    die("Verbinding mislukt: " . $e->getMessage());
}

$melding = "";

// nieuw bericht opslaan
if (isset($_POST["verzenden"])) {
    $naam = trim($_POST["naam"]);
    $bericht = trim($_POST["bericht"]);

    if (!empty($naam) && !empty($bericht)) {
        $sql = "INSERT INTO berichten (naam, bericht) VALUES (:naam, :bericht)";
        $stmt = $pdo->prepare($sql);
        $stmt->bindParam(":naam", $naam);
        $stmt->bindParam(":bericht", $bericht);

        if ($stmt->execute()) {
            $melding = "Bericht toegevoegd.";
        } else {
            $melding = "Er is een fout.";
        }
    } else {
        $melding = "Vul alle velden in.";
    }
}

// alle berichten ophalen
$sql = "SELECT * FROM berichten ORDER BY datumtijd DESC";
$stmt = $pdo->prepare($sql);
$stmt->execute();
$berichten = $stmt->fetchAll(PDO::FETCH_ASSOC);
?>

<!DOCTYPE html>
<html lang="nl">
<head>
    <meta charset="UTF-8">
    <title>Gastenboek</title>
</head>
<body>

    <h1>Gastenboek</h1>

    <p><?php echo $melding; ?></p>

    <form method="post" action="">
        <label for="naam">Naam:</label><br>
        <input type="text" name="naam" id="naam"><br><br>

        <label for="bericht">Bericht:</label><br>
        <textarea name="bericht" id="bericht" rows="5" cols="40"></textarea><br><br>

        <input type="submit" name="verzenden" value="Verzenden">
    </form>

    <hr>

    <h2>Alle berichten</h2>

    <?php foreach ($berichten as $row) { ?>
        <p>
            <strong>Naam:</strong> <?php echo htmlspecialchars($row["naam"]); ?><br>
            <strong>Datum en tijd:</strong> <?php echo $row["datumtijd"]; ?><br>
            <strong>Bericht:</strong><br>
            <?php echo nl2br(htmlspecialchars($row["bericht"])); ?>
        </p>
        <hr>
    <?php } ?>

</body>
</html>