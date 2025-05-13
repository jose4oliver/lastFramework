<?php

    require_once __DIR__ . '/../vendor/autoload.php';

    use Framework\Routing\Route;

    require_once __DIR__ . '/../routes/route.php';

    $uri = parse_url($_SERVER['REQUEST_URI'], PHP_URL_PATH);
    $method = $_SERVER['REQUEST_METHOD'];

    Route::dispatch($uri, $method);