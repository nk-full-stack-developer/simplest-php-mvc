<?php

http_response_code(404);

$page = '404';
$title = '404-Not Found';
$view = __DIR__ . '/../views/404.view.php';


if (!file_exists($view)) {
    throw new Exception('views/404.view.php not found');
}

require $view;
