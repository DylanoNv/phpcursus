<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>opdr 2</title>
</head>
<body>
    <form method="post">
        Getal 1: <input type="number" name="g1" required><br><br>
        Getal 2: <input type="number" name="g2" required><br><br>

        <input type="radio" name="actie" value="optellen" required> Optellen<br>
        <input type="radio" name="actie" value="aftrekken" required> Aftrekken<br>
        <input type="radio" name="actie" value="vermenigvuldigen" required> Vermenigvuldigen<br>
        <input type="radio" name="actie" value="delen" required> Delen<br><br>

        <button type="submit">Berekenen</button>
    </form>

    <?php
    if ($_SERVER['REQUEST_METHOD'] == 'POST') {
        $g1 = $_POST['g1'];
        $g2 = $_POST['g2'];
        $actie = $_POST['actie'];

        if ($actie == 'optellen') {
            $resultaat = $g1 + $g2;
            $bewerking = '+';
        } elseif ($actie == 'aftrekken') {
            $resultaat = $g1 - $g2;
            $bewerking = '-';
        } elseif ($actie == 'vermenigvuldigen') {
            $resultaat = $g1 * $g2;
            $bewerking = '*';
        } elseif ($actie == 'delen') {
            if ($g2 != 0) {
                $resultaat = $g1 / $g2;
                $bewerking = '/';
            } else {
                echo "<p>Fout: Delen door nul is niet toegestaan.</p>";
                exit;
            }
        }

        echo "<p>$g1 $bewerking $g2 = $resultaat</p>";
    }
?>
        
</body>
</html>