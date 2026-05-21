<?php
// auteur: Dylano Nietveld
// functie: inloggen

session_start();
require_once 'functions.php';

if (isset($_POST['login'])) {
    $username = $_POST['username'];
    $password = $_POST['password'];

    $user = login($username, $password);

    if ($user) {
        $_SESSION['user'] = $user;
        header("Location: index.php");
        exit();
    } else {
        $fout = "Onjuiste inloggegevens";
    }
}
?>

<!DOCTYPE html>
<html lang="nl">
<head>
    <meta charset="UTF-8">
    <title>Login</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <h1>Login</h1>

    <?php if (isset($fout)) echo "<p>$fout</p>"; ?>

    <form method="post">
        <label>Gebruikersnaam:</label>
        <input type="text" name="username" required><br><br>

        <label>Wachtwoord:</label>
        <input type="text" name="password" required><br><br>

        <button type="submit" name="login">Login</button>
    </form>

    <p>Admin: admin / 1234</p>
    <p>Bezoeker: bezoeker / 1234</p>
</body>
</html>