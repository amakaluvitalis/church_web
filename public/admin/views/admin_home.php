<?php
session_start();

// Redirect to login if not logged in
if (!isset($_SESSION['admin_name'])) {
    header("Location: ../login.php");
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
<body class="flex bg-gray-100">

    <!-- Sidebar -->
    <aside class="w-64 bg-[#660000] text-white min-h-screen flex flex-col">
        <?php include_once "../components/sidebar.php"; ?>
    </aside>

    <!-- Main Content -->
    <main class="flex-1 p-6">
        <h1 class="text-3xl font-bold text-gray-700 mb-6">Welcome, <?= $_SESSION['admin_name'] ?? "Admin"; ?>!</h1>

        <div id="admin-content">
            <?php include "../components/dashboard.php"; ?>  <!-- Default page -->
        </div>
    </main>

<script>
    $(document).ready(function() {
        // Get the last selected page, or use "dashboard" as default
        let lastPage = localStorage.getItem("admin_last_page") || "dashboard";

        // Load the last page immediately (BEFORE showing anything)
        $("#admin-content").html('<div class="text-gray-500 text-center mt-4">Loading...</div>'); // Optional loading message
        $("#admin-content").load("../components/" + lastPage + ".php");

        $(".menu-item").click(function(event) {
            event.preventDefault(); // Prevent default anchor behavior

            let page = $(this).data("page");

            // Save the selected page in localStorage
            localStorage.setItem("admin_last_page", page);

            // Load the new page smoothly
            $("#admin-content").fadeOut(200, function() {
                $("#admin-content").load("../components/" + page + ".php", function() {
                    $("#admin-content").fadeIn(200);
                });
            });
        });
    });
</script>



</body>
</html>
