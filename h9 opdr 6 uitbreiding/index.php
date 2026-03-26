<?php
// auteur: Dylano Nietveld
// functie: gastenboek overzicht en toevoegen

require_once "config.php";

// check login
if (!isset($_SESSION["user_id"])) {
    header("Location: login.php");
    exit;
}

$melding = "";

// bericht toevoegen
if (isset($_POST["verzenden"])) {
    $bericht = trim($_POST["bericht"]);

    if (!empty($bericht)) {
        $sql = "INSERT INTO berichten (user_id, bericht) VALUES (:user_id, :bericht)";
        $stmt = $pdo->prepare($sql);
        $stmt->bindParam(":user_id", $_SESSION["user_id"]);
        $stmt->bindParam(":bericht", $bericht);

        if ($stmt->execute()) {
            $melding = "Bericht toegevoegd.";
        } else {
            $melding = "Fout bij opslaan.";
        }
    } else {
        $melding = "Vul een bericht in.";
    }
}

// berichten halen + username join
$sql = "
SELECT berichten.*, users.username 
FROM berichten 
JOIN users ON berichten.user_id = users.id
ORDER BY datumtijd DESC
";

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

<p>Welkom: <strong><?php echo $_SESSION["username"]; ?></strong></p>
<a href="logout.php">Uitloggen</a>

<p><?php echo $melding; ?></p>

<h2>Nieuw bericht</h2>

<form method="post">
    <textarea name="bericht" rows="4" cols="40"></textarea><br><br>
    <input type="submit" name="verzenden" value="Plaatsen">
</form>

<hr>

<h2>Berichten</h2>

<?php foreach ($berichten as $row) { ?>
    <p>
        <strong><?php echo htmlspecialchars($row["username"]); ?></strong><br>
        <?php echo $row["datumtijd"]; ?><br><br>
        <?php echo nl2br(htmlspecialchars($row["bericht"])); ?>
    </p>

    <?php if ($_SESSION["is_admin"] == 1) { ?>
        <a href="edit.php?id=<?php echo $row["id"]; ?>">Bewerken</a>
        <a href="delete.php?id=<?php echo $row["id"]; ?>">Verwijderen</a>
    <?php } ?>

    <hr>
<?php } ?>

</body>
</html>