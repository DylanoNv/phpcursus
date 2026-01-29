<?php
try {
    $db = new PDO("mysql:host=localhost;dbname=fietsenmaker;charset=utf8mb4", "root", "");
    $db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
} catch (PDOException $e) {
    die("Er is een databasefout opgetreden!");
}
