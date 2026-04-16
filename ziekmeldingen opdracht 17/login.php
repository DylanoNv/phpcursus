<?php
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
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
</head>
<body>
    <h1>Login</h1>

    <?php if (isset($fout)) echo "<p>$fout</p>"; ?>

    <form method="post">
        <label>Gebruikersnaam:</label>
        <input type="text" name="username" required><br><br>

        <label>Wachtwoord:</label>
        <input type="text" name="password" required><br><br>

        <input type="submit" name="login" value="Login">
    </form>
</body>
</html>