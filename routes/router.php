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
        exit;
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
    default:
        include "views/404.php";
        break;
}
