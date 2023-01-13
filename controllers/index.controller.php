<?php
$page = 'home';
$title = 'Welcome!';
$view = __DIR__ . './../views/index.view.php';


if (!file_exists($view)) {
    throw new Exception('views/index.view.php not found');
}

require $view;
