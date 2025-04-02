<?php
// ✅ Start session only if it's not already started
if (session_status() === PHP_SESSION_NONE) {
    session_start();
}

$page = isset($_GET['page']) ? $_GET['page'] : 'login';

// ✅ Admin routing logic
switch ($page) {
    case 'login':
        $pageTitle = "Admin Login";
        include __DIR__ . '/../views/login.php';
        break;

    case 'dashboard':
        // ✅ Redirect to login if user is not logged in
        if (!isset($_SESSION['admin_name'])) {
            header("Location: index.php?page=login");
            exit();
        }
        $pageTitle = "Admin Dashboard";
        include __DIR__ . '/../views/admin-home.php';
        break;

    case 'logout':
        // ✅ Destroy session and redirect to login
        session_destroy();
        header("Location: index.php?page=login");
        exit();
        break;

    default:
        // ✅ 404 page for unknown routes
        include __DIR__ . '/../views/404.php';
        break;
}
