<?php

$page = isset($_GET['page']) ? $_GET['page'] : 'home';

switch ($page) {
    case 'home':
        $pageTitle = "Home";
        include "views/home.php";
        break;
    case 'who-we-are':
        $pageTitle = "Who We Are";
        include "views/who-we-are.php";
        break;
    case 'history':
        $pageTitle = "History";
        include "views/history.php";
        break;
    case 'administration':
        $pageTitle = "Administration";
        include "views/administration.php";
        break;
    case 'governance':
        $pageTitle = "Governance";
        include "views/governance.php";
        break;
    case 'ministries':
        $pageTitle = "Ministries";
        include "views/ministries.php";
        break;
    case 'activities':
        $pageTitle = "Activities";
        include "views/activities.php";
        break;
    case 'resources':
        $pageTitle = "Resources";
        include "views/resources.php";
        break;
    case 'get-involved':
        $pageTitle = "Get Involved";
        include "views/get-involved.php";
        break;
    case 'contact-us':
        $pageTitle = "Contact Us";
        include "views/contact-us.php";
        break;
    case 'become-member':
        $pageTitle = "Join Us";
        include "views/become-member.php";
        break;
    case 'prayer-line':
        $pageTitle = "Prayer Line";
        include "views/prayer-line.php";
        break;

    case 'admin-login':
        $_GET['page'] = 'login';
        include "public/admin/views/login.php";
        break;

    case 'logout':
        session_destroy();
        header("Location: /?page=admin-login");
        exit();
        break;

    case 'admin-home':
        session_start();
        error_log("Checking session...");
        error_log("Session Data: " . json_encode($_SESSION));
    
        if (!isset($_SESSION['admin_name'])) {
            error_log("Access denied. Redirecting to admin-login...");
            header("Location: /?page=admin-login");
            exit();
        }
        error_log("Session found! Loading admin-home...");
        $pageTitle = "Admin Dashboard";
        include __DIR__ . "/../public/admin/views/admin-home.php";
        break;
    default:
        include "views/404.php";
        break;
}