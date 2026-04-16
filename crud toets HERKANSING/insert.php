<?php
// functie: formulier en database insert genre
// auteur: Dylano Nietveld

echo "<h1>Insert Genre</h1>";

require_once('functions.php');

if(isset($_POST) && isset($_POST['btn_ins'])){

    if(insertRecord($_POST) == true){
        echo "<script>alert('Genre is toegevoegd')</script>";
        echo "<script> location.replace('index.php'); </script>";
    } else {
        echo '<script>alert("Genre is NIET toegevoegd")</script>';
    }
}
?>
<!DOCTYPE html>
<html lang="nl">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Insert Genre</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <form method="post">

        <label for="genrenaam">Genrenaam:</label>
        <input type="text" id="genrenaam" name="genrenaam" required><br>

        <input type="submit" name="btn_ins" value="Insert">
    </form>
    
    <br><br>
    <a href='index.php'>Home</a>
</body>
</html>