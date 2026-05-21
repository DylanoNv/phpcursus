<?php
// auteur: Dylano Nietveld
// functie: overzicht nieuwsberichten

session_start();
require_once 'functions.php';

$categorieen = getCategorieen();

$categorieId = $_GET['categorie'] ?? null;
$zoekterm = $_GET['zoek'] ?? null;

$berichten = getBerichten($categorieId, $zoekterm);
?>

<!DOCTYPE html>
<html lang="nl">
<head>
    <meta charset="UTF-8">
    <title>Nieuwssysteem</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <h1>Nieuwssysteem</h1>

    <nav>
        <a href="index.php">Home</a>

        <?php if (isLoggedIn()): ?>
            <?php if (isAdmin()): ?>
                <a href="beheer.php">Beheer</a>
            <?php endif; ?>
            <a href="logout.php">Uitloggen</a>
        <?php else: ?>
            <a href="login.php">Login</a>
        <?php endif; ?>
    </nav>

    <hr>

    <form method="get">
        <input type="text" name="zoek" placeholder="Zoeken..." value="<?php echo htmlspecialchars($zoekterm ?? ''); ?>">
        <button type="submit">Zoeken</button>
    </form>

    <h2>Categorieën</h2>
    <a href="index.php">Alle berichten</a>
    <?php foreach ($categorieen as $categorie): ?>
        <a href="index.php?categorie=<?php echo $categorie['id']; ?>">
            <?php echo htmlspecialchars($categorie['naam']); ?>
        </a>
    <?php endforeach; ?>

    <h2>Nieuwsberichten</h2>

    <?php if (empty($berichten)): ?>
        <p>Geen nieuwsberichten gevonden.</p>
    <?php endif; ?>

    <?php foreach ($berichten as $bericht): ?>
        <article>
            <h3>
                <a href="bericht.php?id=<?php echo $bericht['id']; ?>">
                    <?php echo htmlspecialchars($bericht['titel']); ?>
                </a>
            </h3>

            <p><strong>Categorie:</strong> <?php echo htmlspecialchars($bericht['categorie_naam']); ?></p>
            <p><?php echo htmlspecialchars(substr($bericht['inhoud'], 0, 120)); ?>...</p>
            <p><strong>Gelezen:</strong> <?php echo $bericht['gelezen']; ?> keer</p>

            <a href="bericht.php?id=<?php echo $bericht['id']; ?>">Lees meer</a>
        </article>
        <hr>
    <?php endforeach; ?>
</body>
</html>