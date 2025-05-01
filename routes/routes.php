<?php
$uri = parse_url($_SERVER['REQUEST_URI'], PHP_URL_PATH);
// echo "Requested URI: " . $uri;


$routes = [
    '/tribite/' => $_SERVER['DOCUMENT_ROOT'] . '/tribite/app/views/landing.php',
    '/tribite/login' => $_SERVER['DOCUMENT_ROOT'] . '/tribite/app/views/login.php',
];

// Jika route ditemukan
if (array_key_exists($uri, $routes)) {
    require $routes[$uri];
} else {
    http_response_code(404);
    echo "404 - Halaman tidak ditemukan";
}
