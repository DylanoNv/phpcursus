<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Cijfers Tabel</title>
    <style>
        table, td, th {
            border: 1px solid black;
            border-collapse: collapse;
            padding: 12px;
        }
        td{
            text-align: center;
            color: grey;
            background-color: lightgrey;
        }
        th{
            text-align: center;
            color: white;
            background-color: darkgreen;
            padding: 12px;
        }
        
    </style>
</head>
<body>

<?php

define("DATABASE", "cijfers");
define("SERVERNAME", "localhost");
define("USERNAME", "root");
define("PASSWORD", "");

define("CRUD_TABLE", "cijferlijst");

$connectdb = mysqli_connect(SERVERNAME, USERNAME, PASSWORD, DATABASE);
if (!$connectdb) {
    die("Verbindingsfout: " . mysqli_connect_error());
}

function deleteRecord($id) {
    global $connectdb;
    $sql = "DELETE FROM cijferlijst WHERE id = ?";
    $stmt = $connectdb->prepare($sql);
    $stmt->bind_param("i", $id);
    $stmt->execute();
    return $stmt->affected_rows > 0;
}

$search = isset($_GET['search']) ? trim($_GET['search']) : '';

if ($search !== '') {
    $query = "SELECT * FROM cijferlijst WHERE leerling LIKE ?";
    $stmt = $connectdb->prepare($query);
    $searchParam = '%' . $search . '%';
    $stmt->bind_param("s", $searchParam);
} else {
    $query = "SELECT * FROM cijferlijst";
    $stmt = $connectdb->prepare($query);
}

$stmt->execute();

$result = $stmt->get_result();

if (!$result) {
    echo "Fout bij ophalen van resultaten: " . $connectdb->error;
} else {
    echo "<form method='GET' action=''>";
    echo "<label for='search'>Zoek leerling op naam:</label>";
    echo "<input type='text' id='search' name='search' value='" . htmlspecialchars($search) . "'>";
    echo "<input type='submit' value='Zoeken'>";
    echo "</form>";
    echo "<br>";
    echo "<a href='opdr4_insert.php'><button>Add Nieuw Cijfer</button></a>";
    echo "<br><br>";
    
    echo "<table>\n";
    echo "<tr><th>ID</th><th>Naam</th><th>Cijfer</th><th>Vak</th><th>Docent</th><th>Delete</th></tr>\n";
    while ($row = $result->fetch_assoc()) {
        echo "<tr>";
        echo "<td>" . htmlspecialchars($row['id']) . "</td>";
        echo "<td>" . htmlspecialchars($row['leerling']) . "</td>";
        echo "<td>" . htmlspecialchars($row['cijfer']) . "</td>";
        echo "<td>" . htmlspecialchars($row['vak']) . "</td>";
        echo "<td>" . htmlspecialchars($row['docent']) . "</td>";
        echo "<td><a href='delete.php?id=" . $row['id'] . "'>Delete</a></td>";
        echo "</tr>\n";
    }
    echo "</table>\n";
}

function gemiddeldecijfer() {
    global $connectdb;
    $sql = "SELECT AVG(cijfer) AS gemiddelde FROM cijferlijst";
    $result = $connectdb->query($sql);
    if ($result) {
        $row = $result->fetch_assoc();
        return round($row['gemiddelde'], 2);
    } else {
        return "Fout bij berekenen gemiddelde: " . $connectdb->error;
    }
}
echo "<p>Gemiddelde Cijfer: " . gemiddeldecijfer() . "</p>";

function hoogsteCijfer() {
    global $connectdb;
    $sql = "SELECT MAX(cijfer) AS hoogste FROM cijferlijst";
    $result = $connectdb->query($sql);
    if ($result) {
        $row = $result->fetch_assoc();
        return round($row['hoogste'], 2);
    } else {
        return "Fout bij berekenen hoogste cijfer: " . $connectdb->error;
    }
}

function laagsteCijfer() {
    global $connectdb;
    $sql = "SELECT MIN(cijfer) AS laagste FROM cijferlijst";
    $result = $connectdb->query($sql);
    if ($result) {
        $row = $result->fetch_assoc();
        return round($row['laagste'], 2);
    } else {
        return "Fout bij berekenen laagste cijfer: " . $connectdb->error;
    }
}

echo "<p>Hoogste Cijfer: " . hoogsteCijfer() . "</p>";
echo "<p>Laagste Cijfer: " . laagsteCijfer() . "</p>";
?>
</body></html>