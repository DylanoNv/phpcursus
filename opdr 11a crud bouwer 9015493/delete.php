<?php
// auteur: Dylano Nietveld
// functie: verwijder een brouwer op basis van de id
include 'functions.php';

// Haal brouwer uit de database
if(isset($_GET['id'])){

    $result = deleteRecord($_GET['id']);

    if($result === true){
        echo '<script>alert("Brouwcode: ' . $_GET['id'] . ' is verwijderd")</script>';
        echo "<script> location.replace('index.php'); </script>";
    } elseif($result === "in_gebruik"){
        echo '<script>alert("Deze brouwer kan niet worden verwijderd omdat hij in gebruik is")</script>';
        echo "<script> location.replace('index.php'); </script>";
    } else {
        echo '<script>alert("Brouwer is NIET verwijderd")</script>';
    }
}
?>