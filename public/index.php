<?php

session_start();

// Everything saved in the session, is available
// in SuperGlobal array named: $_SESSION

require __DIR__ . '/../config/config.php';

// security
// Whitelist of allowed routes

// Allowed routes/pages
$allowed = array(
    'index'
);


// Route
if (empty($_GET['p'])) {
    $p = 'index';
} else {
    $p = trim($_GET['p']);
}

try {
    if (in_array($p, $allowed)) {
        $file = $p . '.controller.php';
    } else {
        $file = '404.controller.php';
    }

    $path = __DIR__ . '/../controllers/' . $file;

    if (!file_exists($path)) {
        throw new Exception('controllers/' . $file . ' Controller not found');
    }

    require $path;

} catch (Exception $e) {
    echo 'We experienced a problem: ' . $e->getMessage();
    die;
}
