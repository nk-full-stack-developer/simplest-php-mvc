<?php
$page = 'about';
$title = 'About Us';
$view = __DIR__ . './../views/about.view.php';


if (!file_exists($view)) {
    throw new Exception('views/about.view.php not found');
}

require $view;
