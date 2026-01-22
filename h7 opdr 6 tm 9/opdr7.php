<?php
$startkapitaal = 100000;
$rente = 4;
$opname = 5000;

$resultaat = "";

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $startkapitaal = (float) str_replace(',', '.', ($_POST['startkapitaal'] ?? 0));
    $rente = (float) str_replace(',', '.', ($_POST['rente'] ?? 0));
    $opname = (float) str_replace(',', '.', ($_POST['opname'] ?? 0));

    if ($startkapitaal <= 0 || $opname <= 0) {
        $resultaat = "Vul geldige waarden in.";
    } else {
        $kapitaal = $startkapitaal;
        $jaren = 0;

        while ($jaren < 100) {
            $nieuwKapitaal = $kapitaal * (1 + ($rente / 100)) - $opname;

            if ($nieuwKapitaal < 0) {
                break;
            }

            $kapitaal = $nieuwKapitaal;
            $jaren++;
        }

        if ($jaren >= 100) {
            $resultaat = "U kunt dit bedrag uw hele leven lang opnemen (langer dan 100 jaar).";
        } else {
            $resultaat = "U kunt " . $jaren . " jaar lang € " . number_format($opname, 0, ',', '.') . " opnemen.";
        }
    }
}
?>
<!DOCTYPE html>
<html lang="nl">
<head>
    <meta charset="UTF-8">
    <title>php h7 opdracht 7 dylano nietveld</title>
</head>
<body>
    <form method="post">
        <label>Startkapitaal</label><br>
        <input type="text" name="startkapitaal" value="<?= htmlspecialchars((string)$startkapitaal) ?>"><br><br>

        <label>Rentepercentage</label><br>
        <input type="text" name="rente" value="<?= htmlspecialchars((string)$rente) ?>"><br><br>

        <label>Jaarlijkse opname</label><br>
        <input type="text" name="opname" value="<?= htmlspecialchars((string)$opname) ?>"><br><br>

        <button type="submit">Bereken de looptijd</button>
    </form>

    <p><?= htmlspecialchars($resultaat) ?></p>
</body>
</html>