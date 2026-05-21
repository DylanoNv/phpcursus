<?php
// auteur: Dylano Nietveld
// functie: uitloggen

session_start();
session_destroy();

header("Location: login.php");
exit();
?>