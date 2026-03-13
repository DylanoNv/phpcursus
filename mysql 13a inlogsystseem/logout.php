<?php
// auteur: Dylano Nietveld
// functie: uitlog functie

require_once "config.php";

session_unset();
session_destroy();

header("Location: login.php");
exit;
?>