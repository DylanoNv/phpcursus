<?php
// auteur: Dylano Nietveld
// functie: account aanmaken met 2FA secret

require_once "config.php";

$melding = "";
$secretVoorWeergave = "";

if (isset($_POST['register'])) {
    $username = trim($_POST['username']);
    $password = trim($_POST['password']);

    if (empty($username) || empty($password)) {
        $melding = "Vul alle velden in.";
    } else {
        $sql = "SELECT * FROM users WHERE username = :username";
        $stmt = $conn->prepare($sql);
        $stmt->execute([':username' => $username]);
        $user = $stmt->fetch();

        if ($user) {
            $melding = "Gebruikersnaam bestaat al.";
        } else {
            $hashedPassword = password_hash($password, PASSWORD_DEFAULT);
            $secret = generateSecret();

            $sql = "INSERT INTO users (username, password, secret) VALUES (:username, :password, :secret)";
            $stmt = $conn->prepare($sql);
            $stmt->execute([
                ':username' => $username,
                ':password' => $hashedPassword,
                ':secret' => $secret
            ]);

            $melding = "Registratie gelukt. Voeg onderstaande secret toe in Google Authenticator.";
            $secretVoorWeergave = $secret;
        }
    }
}
?>

<!DOCTYPE html>
<html lang="nl">
<head>
    <meta charset="UTF-8">
    <title>Registreren</title>
</head>
<body>
    <h1>Registreren</h1>

    <p><?php echo htmlspecialchars($melding); ?></p>

    <form method="post">
        <label for="username">Gebruikersnaam:</label>
        <input type="text" name="username" id="username" required><br><br>

        <label for="password">Wachtwoord:</label>
        <input type="password" name="password" id="password" required><br><br>

        <input type="submit" name="register" value="Registreren">
    </form>

    <?php if (!empty($secretVoorWeergave)) { ?>
        <h2>2FA secret</h2>
        <p>Open Google Authenticator en voeg handmatig deze code toe:</p>
        <p><strong><?php echo htmlspecialchars($secretVoorWeergave); ?></strong></p>
    <?php } ?>

    <br>
    <a href="login.php">Ga naar inloggen</a>
</body>
</html>