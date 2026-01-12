<?php
define("PI", 3.14);

function omtrek($straal) {
    return 2 * PI * $straal;
}

function oppervlakte($straal) {
    return PI * $straal * $straal;
}

$straal = 5;

echo "De omtrek van een cirkel met straal $straal is: " . round(omtrek($straal), 1) . "<br>";
echo "De oppervlakte van een cirkel met straal $straal is: " . round(oppervlakte($straal), 1);