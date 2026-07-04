<?php
require_once 'functions.php';

$melding = "";

if (isset($_POST['submit'])) {
    $naam = $_POST['naam'];
    $email = $_POST['email'];
    $titel = $_POST['titel'];
    $bericht = $_POST['bericht'];

    if (!empty($naam) && !empty($titel) && !empty($bericht)) {
        voegIdeeToe($naam, $email, $titel, $bericht);
        $melding = "Je idee is toegevoegd!";
    } else {
        $melding = "Vul alle verplichte velden in.";
    }
}

$ideeen = getIdeeen();
?>

<!DOCTYPE html>
<html lang="nl">
<head>
    <meta charset="UTF-8">
    <title>Ideeënbus</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>

<header>
    <h1>Interactieve Ideeënbus</h1>
    <p>Deel jouw idee voor school, bedrijf, project of buurt.</p>
</header>

<main>
    <section class="formulier">
        <h2>Idee indienen</h2>

        <?php if ($melding): ?>
            <p class="melding"><?php echo $melding; ?></p>
        <?php endif; ?>

        <form method="post">
            <label>Naam *</label>
            <input type="text" name="naam" required>

            <label>E-mail</label>
            <input type="email" name="email">

            <label>Titel *</label>
            <input type="text" name="titel" required>

            <label>Bericht *</label>
            <textarea name="bericht" required placeholder="Gebruik bijvoorbeeld [b]vet[/b], [i]cursief[/i], [color=red]rood[/color], [size=18]groot[/size] en smileys :) :( :o"></textarea>

            <button type="submit" name="submit">Verstuur idee</button>
        </form>
    </section>

    <section class="uitleg">
        <h2>Opmaak hulp</h2>
        <p><code>[b]tekst[/b]</code> = vet</p>
        <p><code>[i]tekst[/i]</code> = cursief</p>
        <p><code>[color=red]tekst[/color]</code> = rood</p>
        <p><code>[size=18]tekst[/size]</code> = groter</p>
        <p><code>:)</code> <code>:(</code> <code>:o</code> = smileys</p>
    </section>

    <section class="ideeen">
        <h2>Ingezonden ideeën</h2>

        <?php foreach ($ideeen as $idee): ?>
            <article class="idee">
                <h3><?php echo htmlspecialchars($idee['titel']); ?></h3>
                <p class="meta">
                    Door <?php echo htmlspecialchars($idee['naam']); ?> 
                    op <?php echo $idee['datum']; ?>
                </p>
                <p><?php echo formatBericht($idee['bericht']); ?></p>
            </article>
        <?php endforeach; ?>
    </section>
</main>

</body>
</html>