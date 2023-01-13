<?php
// Error reporting
ini_set('display_errors', 1);
ini_set('error_reporting', E_ALL);

// Setting global session variables
$post = $_SESSION['post'] ?? [];
$errors = $_SESSION['errors'] ?? [];
$_SESSION['post'] = [];
$_SESSION['errors'] = [];

// Include configuration files
require __DIR__ . '/connect.php';
require __DIR__ . '/../utils/util_functions.php';