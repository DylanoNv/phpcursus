<?php
// auteur: Dylano Nietveld
// functie: berichten delete (alleen admins)

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

// check id
if (isset($_GET["id"])) {
    $id = $_GET["id"];

    $sql = "DELETE FROM berichten WHERE id = :id";
    $stmt = $pdo->prepare($sql);
    $stmt->bindParam(":id", $id);
    $stmt->execute();
}

// terug naar index
header("Location: index.php");
exit;
?>