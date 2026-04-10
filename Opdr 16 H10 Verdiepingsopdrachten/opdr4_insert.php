<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Nieuwe Cijfer</title>
</head>
<body>
    <h1>Nieuwe Cijfer</h1>
    <form method="POST" action="">
        <label for="leerling">Student:</label>
        <input type="text" id="leerling" name="leerling" required><br><br>
        
        <label for="cijfer">Cijfer:</label>
        <input type="number" step="0.1" id="cijfer" name="cijfer" required><br><br>
        
        <label for="vak">Vak:</label>
        <input type="text" id="vak" name="vak" required><br><br>
        
        <label for="docent">Docent:</label>
        <input type="text" id="docent" name="docent" required><br><br>
        
        <input type="submit" value="Add Grade">
    </form>
    <br>
    <a href="Opdr9.3.php">Back to List</a>

    <?php
    if ($_SERVER['REQUEST_METHOD'] == 'POST') {
        include 'config.php';
        $connectdb = mysqli_connect(SERVERNAME, USERNAME, PASSWORD, DATABASE);
        if (!$connectdb) {
            die("Verbindingsfout: " . mysqli_connect_error());
        }

        $leerling = trim($_POST['leerling']);
        $cijfer = floatval($_POST['cijfer']);
        $vak = trim($_POST['vak']);
        $docent = trim($_POST['docent']);

        $sql = "INSERT INTO cijferlijst (leerling, cijfer, vak, docent) VALUES (?, ?, ?, ?)";
        $stmt = $connectdb->prepare($sql);
        $stmt->bind_param("sdss", $leerling, $cijfer, $vak, $docent);

        if ($stmt->execute()) {
            echo "<p>Grade added successfully!</p>";
            echo "<script> setTimeout(function(){ window.location.href = 'Opdr9.3.php'; }, 2000); </script>";
        } else {
            echo "<p>Error adding grade: " . $stmt->error . "</p>";
        }

        $stmt->close();
        mysqli_close($connectdb);
    }
    ?>
</body>
</html></content>