<?php
// Opdr 12b 9015493
// index.php

include "connect.php";

$zoek = "";
if (isset($_GET['zoek'])) {
    $zoek = $_GET['zoek'];
}

$sort = "ASC";
if (isset($_GET['sort']) && $_GET['sort'] == "desc") {
    $sort = "DESC";
}

$sql = "SELECT * FROM cijfers WHERE leerling LIKE :zoek ORDER BY leerling $sort";
$stmt = $pdo->prepare($sql);
$stmt->execute([
    ':zoek' => "%" . $zoek . "%"
]);
$cijfers = $stmt->fetchAll(PDO::FETCH_ASSOC);
?>

<!DOCTYPE html>
<html lang="nl">
<head>
    <meta charset="UTF-8">
    <title>Cijfersysteem</title>
    <style>
        body {
            font-family: Arial, sans-serif;
        }

        table {
            border-collapse: collapse;
            width: 900px;
        }

        th, td {
            border: 1px solid #999;
            padding: 8px;
            text-align: left;
        }

        th {
            background-color: #4CAF50;
            color: white;
        }

        .btn {
            padding: 6px 10px;
            text-decoration: none;
            color: white;
            border: none;
            font-size: 12px;
            cursor: pointer;
        }

        .zoek-btn, .invoer-btn {
            background-color: #1e88e5;
        }

        .verwijder-btn {
            background-color: #e53935;
        }

        form {
            margin-bottom: 15px;
        }

        input {
            padding: 6px;
            margin-bottom: 8px;
        }
    </style>
</head>
<body>

<h1>Cijfersysteem</h1>

<form method="get">
    <input type="text" name="zoek" placeholder="Zoek op leerling" value="<?php echo htmlspecialchars($zoek); ?>">
    <button type="submit" class="btn zoek-btn">Zoeken</button>
</form>

<form method="post" action="toevoegen.php">
    <input type="text" name="leerling" placeholder="Leerling" required><br>
    <input type="number" step="0.1" name="cijfer" placeholder="Cijfer" required><br>
    <input type="text" name="vak" placeholder="Vak" required><br>
    <input type="text" name="docent" placeholder="Docent" required><br>
    <button type="submit" class="btn invoer-btn">Invoeren</button>
</form>

<table>
    <tr>
        <th>
            Leerling
            <a href="?zoek=<?php echo urlencode($zoek); ?>&sort=asc" style="color:white;">A-Z</a>
            <a href="?zoek=<?php echo urlencode($zoek); ?>&sort=desc" style="color:white;">Z-A</a>
        </th>
        <th>Cijfer</th>
        <th>Vak</th>
        <th>Docent</th>
        <th>Acties</th>
    </tr>

    <?php foreach ($cijfers as $row) { ?>
        <tr>
            <td><?php echo htmlspecialchars($row['leerling']); ?></td>
            <td><?php echo htmlspecialchars($row['cijfer']); ?></td>
            <td><?php echo htmlspecialchars($row['vak']); ?></td>
            <td><?php echo htmlspecialchars($row['docent']); ?></td>
            <td>
                <a class="btn verwijder-btn" href="verwijder.php?id=<?php echo $row['id']; ?>" onclick="return confirm('Weet je het zeker?')">Verwijder</a>
            </td>
        </tr>
    <?php } ?>
</table>

</body>
</html>