<?php
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Récupérer l'entrée de l'utilisateur
    $userInput = isset($_POST['userInput']) ? $_POST['userInput'] : '';

    // Exemple de logique pour répondre à certaines questions
    $response = "";
    if (stripos($userInput, "association") !== false) {
        $response = "L'Association 'Ingénieur Au Féminin' se consacre à promouvoir la place des femmes dans le domaine de l'ingénierie...";
    } else {
        $response = "Désolé, je ne comprends pas cette question.";
    }

    // Retourner la réponse en JSON
    echo json_encode(['response' => $response]);
}
?>

<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>News - Ingénieur Au Féminin</title>
    <link rel="stylesheet" type="text/css" href="styles/global.css">
    <link rel="stylesheet" type="text/css" href="styles/chatbot.css">
    <link rel="stylesheet" type="text/css" href="styles/header.css">
    <link rel="stylesheet" type="text/css" href="styles/footer.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css">
    <link rel="stylesheet" type="text/css" href="styles/chatbot_bot.css">
    <script src="js/chatbot.js" defer></script>
</head>
<body>

<?php require_once(__DIR__.'/header.php'); ?>
<div class="main">

    <button class="chatbot-toggler">
        <span><img src="https://img.icons8.com/?size=256&id=54385&format=png" alt=""></span>
        <span><img src="https://img.icons8.com/?size=256&id=71200&format=png" alt=""></span>
    </button>
    <div class="chatbot">
        <header>
            <h2>ChatBot</h2>
            <small><img src="https://img.icons8.com/?size=256&id=JIlJqN3SJL07&format=png" alt="">Online</small>
            <span class="close-btn"></span>
        </header>
        <ul class="chatbox">
            <li class="chat incoming">
                <span><img src="https://img.icons8.com/?size=256&id=37410&format=png" alt=""></span>
                <p>Bonjour, comment est-ce que je peux vous aider ?</p>
            </li>
        </ul>
        <div class="chat-input">
            <textarea placeholder="Enter a message..." spellcheck="false" required></textarea>
            <span id="send-btn"><img src="https://img.icons8.com/?size=256&id=ZznWGhUzgWtS&format=png" alt=""></span>
        </div>
    </div>
</div>

<?php require_once(__DIR__."/footer.php"); ?>

<script>
    // Fonction pour envoyer un message
    function sendMessage(event) {
        if (event.key === "Enter" && event.target.value.trim() !== "") {
            // Empêcher l'envoi de la touche Entrée par défaut
            event.preventDefault();

            const userInput = event.target.value.trim();
            addMessage(userInput, "outgoing");

            // Envoyer la requête AJAX vers le serveur PHP
            fetch('your_php_file.php', {
                method: 'POST',
                headers: {
                    'Content-Type': 'application/x-www-form-urlencoded'
                },
                body: 'userInput=' + encodeURIComponent(userInput)
            })
                .then(response => response.json())
                .then(data => {
                    // Ajouter la réponse dans le chat
                    addMessage(data.response, "incoming");
                })
                .catch(error => {
                    console.error("Erreur lors de l'envoi du message :", error);
                });

            // Effacer l'input après l'envoi
            event.target.value = '';
        }
    }

    // Fonction pour ajouter un message au chat
    function addMessage(message, type) {
        const messageContainer = document.getElementById('chatbot-messages');
        const messageElement = document.createElement('div');
        messageElement.classList.add(type);
        messageElement.textContent = message;
        messageContainer.appendChild(messageElement);
        messageContainer.scrollTop = messageContainer.scrollHeight;
    }

    // Fonction pour basculer l'affichage du chatbot
    function toggleChatbot() {
        document.body.classList.toggle('show-chatbot');
    }

    // Fonction pour fermer le chatbot
    function closeChatbot() {
        document.body.classList.remove('show-chatbot');
    }

</script>

</body>
</html>
