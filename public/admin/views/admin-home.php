<?php
if(session_status() === PHP_SESSION_NONE) {
    session_start();
}

// Redirect to login if not logged in
if (!isset($_SESSION['admin_name'])) {
    header("Location: /../login.php");
    exit();
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Dashboard</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script> <!-- jQuery for AJAX -->
</head>
<body class="flex h-screen bg-gray-100">

<aside class="w-64 bg-[#660000] text-white h-full fixed top-0 left-0">
    <?php include_once "public/admin/components/sidebar.php"; ?>
</aside>

<main class="absolute left-64 top-0 w-[calc(100%-16rem)] h-full p-6 bg-gray-100">
    <h1 class="text-3xl font-bold text-gray-700 mb-6">Welcome, <?= $_SESSION['admin_name'] ?? "Admin"; ?>!</h1>

    <div id="admin-content" class="w-full h-full">
        <?php include "public/admin/components/dashboard.php"; ?>  
    </div>
</main>


<script>
$(document).ready(function() {
    // Set default page if none exists in localStorage
    let lastPage = localStorage.getItem("admin_last_page") || "dashboard";

    // Show a loading message before content loads
    $("#admin-content").html('<div class="text-gray-500 text-center mt-4">Loading...</div>');

    // Correct the path issue
    $("#admin-content").load("/public/admin/components/" + lastPage + ".php");

    $(".menu-item").click(function(event) {
        event.preventDefault(); // Prevent page refresh

        let page = $(this).data("page"); // Get the page from the `data-page` attribute

        // Save last selected page in localStorage
        localStorage.setItem("admin_last_page", page);

        // Load the content smoothly
        $("#admin-content").fadeOut(200, function() {
            $("#admin-content").load("/public/admin/components/" + page + ".php", function() {
                $("#admin-content").fadeIn(200);
            });
        });
    });
});

</script>
</body>
</html>
