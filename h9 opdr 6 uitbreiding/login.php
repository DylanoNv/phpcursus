<?php
// auteur: Dylano Nietveld
// functie: inloggen

require_once "config.php";

$melding = "";

if (isset($_POST["login"])) {
    $username = trim($_POST["username"]);
    $password = trim($_POST["password"]);

    if (empty($username) || empty($password)) {
        $melding = "Vul alle velden in.";
    } else {
        $sql = "SELECT * FROM users WHERE username = :username";
        $stmt = $pdo->prepare($sql);
        $stmt->bindParam(":username", $username);
        $stmt->execute();

        $user = $stmt->fetch(PDO::FETCH_ASSOC);

        if ($user && password_verify($password, $user["password"])) {
            $_SESSION["user_id"] = $user["id"];
            $_SESSION["username"] = $user["username"];
            $_SESSION["is_admin"] = $user["is_admin"];

            header("Location: index.php");
            exit;
        } else {
            $melding = "Onjuiste gegevens.";
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

<p><?php echo $melding; ?></p>

<form method="post" action="">
    <label>Gebruikersnaam:</label><br>
    <input type="text" name="username"><br><br>

    <label>Wachtwoord:</label><br>
    <input type="password" name="password"><br><br>

    <input type="submit" name="login" value="Inloggen">
</form>

<br>
<a href="register.php">Nog geen account? Registreer</a>

</body>
</html>