<?php
ob_start();
$current_page = isset($_GET['page']) ? $_GET['page'] : 'home';
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?php echo isset($pageTitle) ? $pageTitle : "ACK All Saints Maseno Parish"; ?></title>

    <!-- Favicon -->
    <link rel="apple-touch-icon" sizes="180x180" href="public/images/apple-touch-icon.png">
    <link rel="icon" type="image/png" sizes="32x32" href="public/images/favicon-32x32.png">
    <link rel="icon" type="image/png" sizes="16x16" href="public/images/favicon-16x16.png">
    <link rel="manifest" href="public/images/site.webmanifest">
    <link rel="icon" type="image/x-icon" href="public/images/favicon.ico">

    <!-- Google Fonts -->
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600;700&display=swap" rel="stylesheet">

    <!-- Tailwind CSS -->
    <script src="https://cdn.tailwindcss.com"></script>

    <!-- Custom Styles -->
    <link rel="stylesheet" href="public/css/index.css">

    <!-- Custom Scripts -->
    <script defer src="public/js/index.js"></script>
</head>

<body class="bg-[#f0e6e6]">

    <!-- Top Contact Bar -->
    <div class="bg-[#a36666] text-white py-2">
        <div class="container mx-auto flex flex-col sm:flex-row justify-between items-center px-4 sm:px-6 space-y-1 sm:space-y-0">
            <span class="text-xs sm:text-sm leading-tight"><strong>Location:</strong> Kisumu Busia RD, Maseno Municipality</span>
            <span class="text-xs sm:text-sm leading-tight"><strong>Need Assistance? Contact:</strong> +254 (7) 960-20551</span>
        </div>
    </div>

    <!-- Header & Navigation -->
    <header class="bg-[#e0cccc] shadow-md">
        <div class="container mx-auto flex justify-between items-center py-4 px-6">
            
            <!-- Logo & Title -->
            <div class="flex items-center space-x-4">
                <img src="public/images/ack_logo.png" alt="Church Logo" class="h-16 lg:h-20 w-auto object-contain">
                <h1 class="text-lg lg:text-xl font-bold text-[#660000]">ACK ALL SAINTS MASENO PARISH</h1>
            </div>

            <!-- Desktop Navigation -->
            <nav class="hidden lg:block">
                <ul class="flex space-x-4">
                    <li><a href="/?page=home" class="<?= $current_page == 'home' ? 'text-[#660000] font-bold' : 'text-black' ?> hover:text-[#660000]">Home</a></li>
                    
                    <li class="group relative">
                    <button id="about-btn" class="text-black hover:text-[#660000] focus:outline-none">About</button>
                    <ul id="about-dropdown" class="absolute left-0 mt-2 hidden bg-white shadow-md p-2 space-y-2">
                        <li><a href="/?page=who-we-are" class="block px-4 py-2 hover:bg-gray-100">Who We Are</a></li>
                        <li><a href="/?page=history" class="block px-4 py-2 hover:bg-gray-100">History</a></li>
                        <li><a href="/?page=administration" class="block px-4 py-2 hover:bg-gray-100">Administration</a></li>
                        <li><a href="/?page=governance" class="block px-4 py-2 hover:bg-gray-100">Governance</a></li>
                    </ul>
                    </li>

                    <li><a href="/?page=ministries" class="<?= $current_page == 'ministries' ? 'text-[#660000] font-bold' : 'text-black' ?> hover:text-[#660000]">Ministries</a></li>
                    <li><a href="/?page=activities" class="<?= $current_page == 'activities' ? 'text-[#660000] font-bold' : 'text-black' ?> hover:text-[#660000]">Activities</a></li>
                    <li><a href="/?page=resources" class="<?= $current_page == 'resources' ? 'text-[#660000] font-bold' : 'text-black' ?> hover:text-[#660000]">Resources</a></li>
                    <li><a href="/?page=get-involved" class="<?= $current_page == 'get-involved' ? 'text-[#660000] font-bold' : 'text-black' ?> hover:text-[#660000]">Get Involved</a></li>
                    <li><a href="/?page=contact-us" class="<?= $current_page == 'contact-us' ? 'text-[#660000] font-bold' : 'text-black' ?> hover:text-[#660000]">Contact Us</a></li>
                    <li><a href="/?page=become-member" class="<?= $current_page == 'become-member' ? 'text-[#660000] font-bold' : 'text-black' ?> hover:text-[#660000]">Join Us</a></li>
                </ul>
            </nav>

            <!-- Mobile Menu Toggle -->
            <button class="lg:hidden text-[#660000]" id="menu-toggle">
                <svg id="menu-icon" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor" class="w-6 h-6">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16M4 18h16"></path>
                </svg>
            </button>
        </div>

        <!-- Mobile Menu -->
        <nav id="mobile-menu" class="fixed top-0 right-0 h-full w-3/4 max-w-sm bg-[#c19999] text-white shadow-lg transform translate-x-full transition-transform duration-300">

        <!-- Close Button (X) - Positioned at Top Left Inside Menu -->
        <button id="close-icon" class="absolute top-4 left-4 text-white hover:text-gray-300 hidden">
            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor" class="w-6 h-6">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12"></path>
            </svg>
        </button>

            <ul class="p-6 space-y-4 mt-10">
                <li><a href="/?page=home" class="hover:text-[#660000]">Home</a></li>
                <li>
                    <button class="w-full text-left flex justify-between items-center hover:text-[#660000]" id="about-toggle">
                        About <span>&#9662;</span>
                    </button>
                    <ul id="about-dropdown-mobile" class="mobile-submenu hidden">
                        <li><a href="/?page=who-we-are" class="block px-4 py-2 hover:bg-gray-700">Who We Are</a></li>
                        <li><a href="/?page=history" class="block px-4 py-2 hover:bg-gray-700">History</a></li>
                        <li><a href="/?page=administration" class="block px-4 py-2 hover:bg-gray-700">Administration</a></li>
                        <li><a href="/?page=governance" class="block px-4 py-2 hover:bg-gray-700">Governance</a></li>
                    </ul>
                </li>

                <li><a href="/?page=ministries" class="hover:text-[#660000]">Ministries</a></li>
                <li><a href="/?page=activities" class="hover:text-[#660000]">Activities</a></li>
                <li><a href="/?page=resources" class="hover:text-[#660000]">Resources</a></li>
                <li><a href="/?page=get-involved" class="hover:text-[#660000]">Get Involved</a></li>
                <li><a href="/?page=contact-us" class="hover:text-[#660000]">Contact Us</a></li>
                <li><a href="/?page=become-member" class="hover:text-[#660000]">Join Us</a></li>
            </ul>
        </nav>
    </header>
</body>
</html>
