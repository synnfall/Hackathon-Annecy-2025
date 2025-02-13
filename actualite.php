<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
<h1>Nos actualités</h1>
<?php
// Read the JSON file
$jsonFile = 'DataBase/event.json'; // Update this with the actual file path
$jsonData = file_get_contents($jsonFile);

// Decode the JSON data into an associative array
$data = json_decode($jsonData, true);

// Check if decoding was successful
if ($data && isset($data['actualités'])) {
    foreach ($data['actualités'] as $article) {
        // Display the title and contents if not empty
        echo "";
        if (!empty($article['title'])) {
            echo "<h2>" . htmlspecialchars($article['title']) . "</h2>";
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
</body>
</html>