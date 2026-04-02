<?php
    // functie: formulier en database insert bier
    // auteur: Dylano Nietveld

    echo "<h1>Insert Bier</h1>";

    require_once('functions.php');

    $brouwers = getBrouwers();
	 
    // Test of er op de insert-knop is gedrukt 
    if(isset($_POST) && isset($_POST['btn_ins'])){

        // test of insert gelukt is
        if(insertRecord($_POST) == true){
            echo "<script>alert('Bier is toegevoegd')</script>";
            echo "<script> location.replace('index.php'); </script>";
        } else {
            echo '<script>alert("Bier is NIET toegevoegd")</script>';
        }
    }
?>
<html>
    <body>
        <form method="post">

        <label for="naam">Naam:</label>
        <input type="text" id="naam" name="naam" required><br>

        <label for="soort">Soort:</label>
        <input type="text" id="soort" name="soort" required><br>

        <label for="stijl">Stijl:</label>
        <input type="text" id="stijl" name="stijl" required><br>

        <label for="alcohol">Alcohol:</label>
        <input type="number" step="0.1" id="alcohol" name="alcohol" required><br>

        <label for="brouwcode">Choose a brouwcode:</label>
        <select name="brouwcode" id="brouwcode" required>
            <?php foreach($brouwers as $brouwer){ ?>
                <option value="<?php echo $brouwer['brouwcode']; ?>">
                    <?php echo $brouwer['naam']; ?>
                </option>
            <?php } ?>
        </select><br><br>

        <input type="submit" name="btn_ins" value="Insert">
        </form>
        
        <br><br>
        <a href='index.php'>Home</a>
    </body>
</html>