<?php
    // functie: update bier
    // auteur: Dylano Nietveld

    require_once('functions.php');

    $brouwers = getBrouwers();

    // Test of er op de wijzig-knop is gedrukt 
    if(isset($_POST['btn_wzg'])){

        // test of update gelukt is
        if(updateRecord($_POST) == true){
            echo "<script>alert('Bier is gewijzigd')</script>";
            echo "<script> location.replace('index.php'); </script>";
        } else {
            echo '<script>alert("Bier is NIET gewijzigd")</script>';
        }
    }

    // Test of id is meegegeven in de URL
    if(isset($_GET['id'])){  
        // Haal alle info van de betreffende id $_GET['id']
        $id = $_GET['id'];
        $row = getRecord($id);
    
?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="stylesheet" href="style.css">
  <title>Wijzig Bier</title>
</head>
<body>
  <h2>Wijzig Bier</h2>
  <form method="post">
    
    <input type="hidden" name="biercode" value="<?php echo $row['biercode']; ?>"><br>

    <label for="naam">Naam:</label>
    <input type="text" id="naam" name="naam" required value="<?php echo $row['naam']; ?>"><br>

    <label for="soort">Soort:</label>
    <input type="text" id="soort" name="soort" required value="<?php echo $row['soort']; ?>"><br>

    <label for="stijl">Stijl:</label>
    <input type="text" id="stijl" name="stijl" required value="<?php echo $row['stijl']; ?>"><br>

    <label for="alcohol">Alcohol:</label>
    <input type="number" step="0.1" id="alcohol" name="alcohol" required value="<?php echo $row['alcohol']; ?>"><br>

    <label for="brouwcode">Choose a brouwcode:</label>
    <select name="brouwcode" id="brouwcode" required>
        <?php foreach($brouwers as $brouwer){ ?>
            <option value="<?php echo $brouwer['brouwcode']; ?>" <?php if($row['brouwcode'] == $brouwer['brouwcode']) echo 'selected'; ?>>
                <?php echo $brouwer['naam']; ?>
            </option>
        <?php } ?>
    </select><br><br>

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