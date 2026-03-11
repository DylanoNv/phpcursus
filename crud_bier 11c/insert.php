<?php
    // functie: formulier en database insert fiets
    // auteur: Dylano Nietveld

    echo "<h1>Insert Fiets</h1>";

    require_once('functions.php');
	 
    // Test of er op de insert-knop is gedrukt 
    if(isset($_POST) && isset($_POST['btn_ins'])){

        // test of insert gelukt is
        if(insertRecord($_POST) == true){
            echo "<script>alert('Fiets is toegevoegd')</script>";
        } else {
            echo '<script>alert("Fiets is NIET toegevoegd")</script>';
        }
    }
?>
<html>
    <body>
        <form method="post">

        <label for="naam">Naam:</label>
        <input type="text" id="naam" name="naam" required><br>

        <label for="soort">Soort:</label>
        <input type="text" id="type" name="soort" required><br>

        <label for="stijl">Stijl:</label>
        <input type="number" id="stijl" name="stijl" required><br>

        <label for="brouwcode">brouwcode:</label>
        <input type="number" id="brouwcode" name="brouwcode" required><br>

        <label for="alcohol">Alcohol:</label>
        <input type="number" id="alcohol" name="alcohol" required><br>

        <input type="submit" name="btn_ins" value="Insert">
        
        
        <br><br>
        <a href='index.php'>Home</a>
    </body>
</html>
