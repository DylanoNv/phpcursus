<?php
session_start();

if (!isset($_SESSION['fruit'])) {
    $_SESSION['fruit'] = [];
}

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    if (isset($_POST['toevoegen'])) {
        $fruit = trim($_POST['fruit'] ?? '');
        if ($fruit !== '') {
            $_SESSION['fruit'][] = $fruit;
        }
    }

    if (isset($_POST['sorteren'])) {
        sort($_SESSION['fruit']);
    }

    if (isset($_POST['schudden'])) {
        shuffle($_SESSION['fruit']);
    }
}
?>
<!DOCTYPE html>
<html lang="nl">
<head>
    <meta charset="UTF-8">
    <title>php h7 opdracht 8 dylano nietveld</title>
</head>
<body>
    <form method="post">
        <label for="fruit">Fruitsoort:</label>
        <input type="text" name="fruit" id="fruit">

        <button type="submit" name="toevoegen">Toevoegen</button>
        <button type="submit" name="sorteren">Sorteren</button>
        <button type="submit" name="schudden">Schudden</button>
    </form>

    <p>Inhoud van array:</p>
    <ul>
        <?php foreach ($_SESSION['fruit'] as $f): ?>
            <li><?= htmlspecialchars($f) ?></li>
        <?php endforeach; ?>
    </ul>
</body>
</html>