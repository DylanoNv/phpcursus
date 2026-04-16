<?php
session_start();
require_once 'functions.php';

if (!isLoggedIn()) {
    header("Location: login.php");
    exit();
}

if ($_SESSION['user']['role'] != 'leraar') {
    header("Location: index.php");
    exit();
}

if (isset($_GET['id'])) {
    $id = $_GET['id'];

    if (deleteZiekmelding($id)) {
        header("Location: index.php");
        exit();
    } else {
        echo "Verwijderen mislukt";
    }
} else {
    header("Location: index.php");
    exit();
}
?>