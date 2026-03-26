<?php
// auteur: Dylano Nietveld
// functie: gebruiker register

require_once "config.php";

$melding = "";

if (isset($_POST["register"])) {
    $username = trim($_POST["username"]);
    $email = trim($_POST["email"]);
    $password = trim($_POST["password"]);

    if (empty($username) || empty($email) || empty($password)) {
        $melding = "Vul alle velden in.";
    } else {
        $sql = "SELECT id FROM users WHERE username = :username";
        $stmt = $pdo->prepare($sql);
        $stmt->bindParam(":username", $username);
        $stmt->execute();

        if ($stmt->fetch()) {
            $melding = "Gebruikersnaam bestaat al.";
        } else {
            $hashedPassword = password_hash($password, PASSWORD_DEFAULT);

            $sql = "INSERT INTO users (username, email, password, is_admin) VALUES (:username, :email, :password, 0)";
            $stmt = $pdo->prepare($sql);
            $stmt->bindParam(":username", $username);
            $stmt->bindParam(":email", $email);
            $stmt->bindParam(":password", $hashedPassword);

            if ($stmt->execute()) {
                $melding = "Registratie gelukt. Je kunt nu inloggen.";
            } else {
                $melding = "Er is een fout.";
            }
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

    <p><?php echo $melding; ?></p>

    <form method="post" action="">
        <label for="username">Gebruikersnaam:</label><br>
        <input type="text" name="username" id="username"><br><br>

        <label for="email">E-mailadres:</label><br>
        <input type="email" name="email" id="email"><br><br>

        <label for="password">Wachtwoord:</label><br>
        <input type="password" name="password" id="password"><br><br>

        <input type="submit" name="register" value="Registreren">
    </form>

    <br>
    <a href="login.php">Heb je al een account? Log hier in</a>
</body>
</html>