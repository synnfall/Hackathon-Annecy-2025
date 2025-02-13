<?php 

$url = $_SERVER['REQUEST_URI'];
$path = explode('?', $url)[0];

if ($path === '/') {
    include __DIR__ . '/../index.html';
} 
elseif ($path === '/a_venir') {
    include __DIR__ . '/../a_venir.php';
}
elseif ($path === '/event') {
    include __DIR__ . '/../event.php';
}
elseif ($path === '/partenaires' || $path === '/partenaire') {
    include __DIR__ . '/../partenaire.php';
}
else {
    http_response_code(404);
    echo '404 Not Found';
}