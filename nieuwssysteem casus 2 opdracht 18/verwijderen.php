<?php
// auteur: Dylano Nietveld
// functie: nieuwsbericht verwijderen

session_start();
require_once 'functions.php';

if (!isAdmin()) {
    header("Location: index.php");
    exit();
}

if (isset($_GET['id'])) {
    $id = $_GET['id'];

    if (verwijderBericht($id)) {
        header("Location: beheer.php");
        exit();
    } else {
        echo "Verwijderen mislukt";
    }
} else {
    header("Location: beheer.php");
    exit();
}
?>