<?php
// auteur: Dylano Nietveld
// functie: verwijder een genre op basis van de id

include 'functions.php';

if(isset($_GET['id'])){

    $result = deleteRecord($_GET['id']);

    if($result === true){
        echo '<script>alert("Genreid: ' . $_GET['id'] . ' is verwijderd")</script>';
        echo "<script> location.replace('index.php'); </script>";
    } else {
        echo '<script>alert("Genre is NIET verwijderd")</script>';
        echo "<script> location.replace('index.php'); </script>";
    }
}
?>