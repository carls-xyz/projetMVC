<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <title><?= $title ?? 'Parc Activités' ?></title>
    <link rel="stylesheet" href="/css/style.css">
</head>
<body>

<header>
    <h1>RESERVATION ACTIVITE</h1>
    <nav class="nav">
        <a href="/activity">Activités</a>
        <a href="/reservation">Réservations</a>
        <a href="/users">Mon compte</a>
    </nav>
</header>

<main>
    <?= $content ?> 
</main>

</body>
</html>