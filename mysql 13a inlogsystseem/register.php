<?php
// auteur: Dylano Nietveld
// functie: account aanmaken

require_once "config.php";

$melding = "";

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

            $sql = "INSERT INTO users (username, password) VALUES (:username, :password)";
            $stmt = $conn->prepare($sql);
            $stmt->execute([
                ':username' => $username,
                ':password' => $hashedPassword
            ]);

            $melding = "Registratie gelukt. Je kunt nu inloggen.";
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

    <br>
    <a href="login.php">Ga naar inloggen</a>
</body>
</html>