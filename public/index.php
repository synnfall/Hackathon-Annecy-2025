<?php 

$url = $_SERVER['REQUEST_URI'];
$path = explode('?', $url)[0];

if ($path === '/') {
    include __DIR__ . '/../index.php';
} 
elseif ($path === '/actualite') {
    include __DIR__ . '/../actualite.php';
}
elseif ($path === '/event') {
    include __DIR__ . '/../event.php';
}
elseif ($path === '/partenaires' || $path === '/partenaire') {
    include __DIR__ . '/../partenaire.php';
}
elseif ($path === '/api/contact') {
    include __DIR__ . '/../api_contact.php';
}
else {
    http_response_code(404);
    echo '404 Not Found';
}