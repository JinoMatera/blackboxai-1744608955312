<?php
// Main entry point
require_once 'config.php';
require_once 'includes/database.php';
require_once 'includes/auth.php';

// Basic routing
$page = $_GET['page'] ?? 'home';

switch($page) {
    case 'login':
        require 'views/auth/login.php';
        break;
    case 'register':
        require 'views/auth/register.php';
        break;
    default:
        require 'views/home.php';
}
?>
