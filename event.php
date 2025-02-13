<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="styles/header.css">
    <link rel="stylesheet" href="styles/pages.css">
    <link rel="stylesheet" href="styles/chatbot.css">
</head>
<body>
<?php require_once('header.php'); ?>
<h1>Nos évenements</h1>
<?php
// Read the JSON file
$jsonFile = 'DataBase/event.json'; // Update this with the actual file path
$jsonData = file_get_contents($jsonFile);

// Decode the JSON data into an associative array
if(!$jsonData){
    echo "Erreur: impossible de charger les donnéesss.";
    exit;
}
$data = json_decode($jsonData, true);

// Check if decoding was successful
if ($data && isset($data['évenements'])) {
    foreach ($data['évenements'] as $article) {
        // Display the title and contents if not empty
        echo "";
        if (!empty($article['title'])) {
            echo "<h2>" . htmlspecialchars($article['title']) . "</h2>";
        }
        if (!empty($article['date'])) {
            echo $article['date']; // Contains HTML content
        }
        // décomenter pour ajouter le contenu:
        if (!empty($article['contents'])) {
            echo $article['contents']; // Contains HTML content
        }
        echo "";
    }
} else {
    echo "Erreur: impossible de charger les données.";
}
?>
    <?php require_once("chatbot.php"); ?>
    <?php require_once("footer.php"); ?>
</body>
</html>

<script src="js/chatbot.js" defer></script>