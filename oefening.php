<?php 
    //Auteur: Nietveld
    //Functie: Oefening arrays en loops

$cijfers = [8, 7, 9, 6, 10, 5];

    //Cijfers printen uit array
for ($x = 0; $x <= 4; $x++) {
    echo "Het cijfer is: $cijfers[$x] <br>";

    // tel het huidige cijfer op bij de som
    $som =$cijfers[$x] + $som;

}

echo "Som is:" . $som;

?>

