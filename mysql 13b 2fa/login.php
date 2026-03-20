<?php
// auteur: Dylano Nietveld
// functie: inloggen en 2FA verification

require_once "config.php";

$melding = "";

if (isset($_POST['login'])) {
    $username = trim($_POST['username']);
    $password = trim($_POST['password']);

    if (empty($username) || empty($password)) {
        $melding = "Vul alle velden in.";
    } else {
        $sql = "SELECT * FROM users WHERE username = :username";
        $stmt = $conn->prepare($sql);
        $stmt->execute([':username' => $username]);
        $user = $stmt->fetch();

        if ($user && password_verify($password, $user['password'])) {
            $_SESSION['temp_user_id'] = $user['id'];
            $_SESSION['temp_username'] = $user['username'];

            header("Location: verify.php");
            exit;
        } else {
            $melding = "Onjuiste gebruikersnaam of wachtwoord.";
        }
    }
}
?>

<!DOCTYPE html>
<html lang="nl">
<head>
    <meta charset="UTF-8">
    <title>Inloggen</title>
</head>
<body>
    <h1>Inloggen</h1>

    <p><?php echo htmlspecialchars($melding); ?></p>

    <form method="post">
        <label for="username">Gebruikersnaam:</label>
        <input type="text" name="username" id="username" required><br><br>

        <label for="password">Wachtwoord:</label>
        <input type="password" name="password" id="password" required><br><br>

        <input type="submit" name="login" value="Inloggen">
    </form>

    <br>
    <a href="register.php">Heb je geen account? Registreer hier</a>
</body>
</html>