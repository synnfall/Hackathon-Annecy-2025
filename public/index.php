<?php 

$url = $_SERVER['REQUEST_URI'];
$path = explode('?', $url)[0];

if ($path === '/') {
    require __DIR__ . '/../pages/index.php';
} elseif ($path === '/news' || $path === '/new') {
    require __DIR__ . '/../pages/news.php';
}
elseif ($path === '/contact') {
    require __DIR__ . '/../pages/contact.php';
} 
elseif ($path === '/chatbot') {
    require __DIR__ . '/../pages/chatbot.php';
} else {
    http_response_code(404);
    echo '404 Not Found';
}