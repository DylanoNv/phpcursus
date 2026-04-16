<?php
// functie: update genre
// auteur: Dylano Nietveld

require_once('functions.php');

if(isset($_POST['btn_wzg'])){

    if(updateRecord($_POST) == true){
        echo "<script>alert('Genre is gewijzigd')</script>";
        echo "<script> location.replace('index.php'); </script>";
    } else {
        echo '<script>alert("Genre is NIET gewijzigd")</script>';
    }
}

if(isset($_GET['id'])){  
    $id = $_GET['id'];
    $row = getRecord($id);
?>
<!DOCTYPE html>
<html lang="nl">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Wijzig Genre</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <h2>Wijzig Genre</h2>
    <form method="post">
        
        <input type="hidden" id="id" name="id" required value="<?php echo $row['genreid']; ?>"><br>

        <label for="genrenaam">Genrenaam:</label>
        <input type="text" id="genrenaam" name="genrenaam" required value="<?php echo $row['genrenaam']; ?>"><br>

        <input type="submit" name="btn_wzg" value="Wijzig">
    </form>
    <br><br>
    <a href='index.php'>Home</a>
</body>
</html>

<?php
} else {
    echo "Geen id opgegeven<br>";
}
?>