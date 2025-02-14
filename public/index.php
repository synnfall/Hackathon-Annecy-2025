<?php 

$url = $_SERVER['REQUEST_URI'];
$path = explode('?', $url)[0];

if ($path === '/') {
    require __DIR__ . '/../index.php';
} elseif ($path === '/contact') {
    require __DIR__ . '/about.php';
} else {
    http_response_code(404);
    echo '404 Not Found';
}