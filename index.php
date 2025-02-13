<?php
?>
<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport">
    <title>Ingenieur Au Féminin</title>
    <link rel="stylesheet" href="styles/pages.css">
    <link rel="stylesheet" href="styles/chatbot.css">
</head>
<body>

<?php require_once('header.php'); ?>

<main>
    <!-- Section de présentation -->
    <section>
        <div>
            <img src="public/assets/Logo_IAF.png" alt="Logo" class="logo">
            <h1>Ingénieur au Féminin</h1>
        </div>
    </section>

    <!-- Section des textes -->
    <section>
        <h2>Pourquoi choisir l’ingénierie ?</h2>
        <p>Les femmes ont toute leur place dans le domaine de l'ingénierie. Découvrez des témoignages inspirants, des parcours et des opportunités pour faire évoluer votre carrière.</p>
    </section>
</main>
<script src="js/chatbot.js"></script>
<?php require_once("chatbot.php"); ?>
<?php require_once("footer.php"); ?>
</body>
</html>