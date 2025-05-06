<?php

$request = $_SERVER['REQUEST_URI'];
$viewDir = '/app/views/';

switch ($request) {
    case '/home':
        require __DIR__ . $viewDir . 'landing.php';
        break;

    case '/login':
        require __DIR__ . $viewDir . 'login.php';
        break;

    case '/menu':
        require __DIR__ . $viewDir . 'menu.php';
        break;

    case '/profile':
        require __DIR__ . $viewDir . 'profile.php';
        break;

    default:
        http_response_code(404);
        require __DIR__ . $viewDir . '404.php';
}