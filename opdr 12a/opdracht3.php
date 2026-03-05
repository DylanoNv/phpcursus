<?php
// Opdr 12a boekopdr 3 9015493

$conn = new mysqli("localhost", "root", "", "cijfersysteem");

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

$sql = "SELECT leerling, cijfer FROM cijfers";
$result = $conn->query($sql);

echo "<table border='1'>";
echo "<tr><th>Leerling</th><th>Cijfer</th></tr>";

while($row = $result->fetch_assoc()) {
    echo "<tr>";
    echo "<td>" . $row["leerling"] . "</td>";
    echo "<td>" . $row["cijfer"] . "</td>";
    echo "</tr>";
}

echo "</table>";

$conn->close();
?>