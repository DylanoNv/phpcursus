<?php
// auteur: Dylano Nietveld
// functie: berichten edit (alleen admin)

require_once "config.php";

// check login
if (!isset($_SESSION["user_id"])) {
    header("Location: login.php");
    exit;
}

// check admin
if ($_SESSION["is_admin"] != 1) {
    die("Geen toegang.");
}

$melding = "";

// check of id bestaat
if (!isset($_GET["id"])) {
    die("Geen bericht gekozen.");
}

$id = $_GET["id"];

// huidig bericht ophalen
$sql = "SELECT * FROM berichten WHERE id = :id";
$stmt = $pdo->prepare($sql);
$stmt->bindParam(":id", $id);
$stmt->execute();
$bericht = $stmt->fetch(PDO::FETCH_ASSOC);

if (!$bericht) {
    die("Bericht niet gevonden.");
}

// update uitvoeren
if (isset($_POST["opslaan"])) {
    $nieuweTekst = trim($_POST["bericht"]);

    if (!empty($nieuweTekst)) {
        $sql = "UPDATE berichten SET bericht = :bericht WHERE id = :id";
        $stmt = $pdo->prepare($sql);
        $stmt->bindParam(":bericht", $nieuweTekst);
        $stmt->bindParam(":id", $id);

        if ($stmt->execute()) {
            header("Location: index.php");
            exit;
        } else {
            $melding = "Fout bij opslaan.";
        }
    } else {
        $melding = "Bericht mag niet leeg zijn.";
    }
}
?>

<!DOCTYPE html>
<html lang="nl">
<head>
    <meta charset="UTF-8">
    <title>Bericht bewerken</title>
</head>
<body>

<h1>Bericht bewerken</h1>

<p><?php echo $melding; ?></p>

<form method="post">
    <textarea name="bericht" rows="5" cols="50"><?php echo htmlspecialchars($bericht["bericht"]); ?></textarea><br><br>
    <input type="submit" name="opslaan" value="Opslaan">
</form>

<br>
<a href="index.php">Terug naar gastenboek</a>

</body>
</html>