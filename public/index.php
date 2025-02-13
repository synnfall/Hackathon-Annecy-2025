<?php 

$url = $_SERVER['REQUEST_URI'];
$path = explode('?', $url)[0];

echo $path;
// if ($path === '/') {
//     echo $path;
// } else {
//     http_response_code(404);
//     echo '404 Not Found';
// }