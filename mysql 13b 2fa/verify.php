<?php
// auteur: Dylano Nietveld
// functie: 2FA code controle

require_once "config.php";

if (!isset($_SESSION['temp_user_id'])) {
    header("Location: login.php");
    exit;
}

$melding = "";

if (isset($_POST['verify'])) {
    $code = trim($_POST['code']);

    if (empty($code)) {
        $melding = "Vul de code in.";
    } else {
        $sql = "SELECT * FROM users WHERE id = :id";
        $stmt = $conn->prepare($sql);
        $stmt->execute([':id' => $_SESSION['temp_user_id']]);
        $user = $stmt->fetch();

        if ($user && !empty($user['secret']) && verifyCode($user['secret'], $code)) {
            $_SESSION['user_id'] = $user['id'];
            $_SESSION['username'] = $user['username'];
            $_SESSION['twofa_ok'] = true;

            unset($_SESSION['temp_user_id']);
            unset($_SESSION['temp_username']);

            header("Location: index.php");
            exit;
        } else {
            $melding = "Onjuiste 2FA code.";
        }
    }
}
?>

<!DOCTYPE html>
<html lang="nl">
<head>
    <meta charset="UTF-8">
    <title>2FA controle</title>
</head>
<body>
    <h1>2FA controle</h1>

    <p>Welkom <?php echo htmlspecialchars($_SESSION['temp_username']); ?>, vul je code uit Google Authenticator in.</p>

    <p><?php echo htmlspecialchars($melding); ?></p>

    <form method="post">
        <label for="code">6-cijferige code:</label>
        <input type="text" name="code" id="code" required><br><br>

        <input type="submit" name="verify" value="Controleren">
    </form>

    <br>
    <a href="login.php">Terug naar login</a>
</body>
</html>