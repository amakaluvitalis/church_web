<?php
if (session_status() === PHP_SESSION_NONE) {
    session_start();
}

$_GET['page'] = isset($_GET['page']) ? $_GET['page'] : 'admin-home';

// Include the main router for centralized page handling
include_once __DIR__ . '/../../routes/router.php';
?>
