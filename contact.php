<?php
?>
<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Ingenieur Au Féminin</title>
    <link rel="stylesheet" type="text/css" href="CSS/global.css">
    <link rel="stylesheet" type="text/css" href="CSS/contact.css">
    <link rel="stylesheet" type="text/css" href="./public/components/header.css">
    <link rel="stylesheet" type="text/css" href="./public/components/footer.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css">
</head>
<body>
<?php require_once('./public/components/header.php'); ?>
<!-- Section du formulaire de contact -->
<div class="contact-section">
    <!-- Section du formulaire Google Forms -->
    <div class="google-form-section">
        <h2>Formulaire de Contact</h2>
        <iframe src="https://docs.google.com/forms/d/e/1FAIpQLSeskfv3HJLuImDHeXuAMvRQNfU_tJIhMm9uctOpWy-YL3AcQw/viewform"
                width="640" height="800" frameborder="0" marginheight="0" marginwidth="0">
            Chargement…
        </iframe>
    </div>

</div>


<?php require_once("./public/components/footer.php"); ?>
</body>
</html>
