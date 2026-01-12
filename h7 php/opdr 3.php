<?php

$kleur = "white";

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $kleur = $_POST['kleur'];
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>opdr 3</title>
</head>
<body style="background-color: <?= $kleur ?>;">
    

<form method="post">
    <input type="radio" name="kleur" value="red" required> Rood<br>
    <input type="radio" name="kleur" value="green" required> Groen<br>
    <input type="radio" name="kleur" value="blue" required> Blauw<br>
    <input type="radio" name="kleur" value="pink" required> Roze<br><br>

    <button type="submit">Instellen</button>
</form>

</body>
</html>