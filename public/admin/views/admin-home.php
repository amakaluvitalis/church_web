<?php
if(session_status() === PHP_SESSION_NONE) {
    session_start();
}

// Redirect to login if not logged in
if (!isset($_SESSION['admin'])) {
    header("Location: /?page=admin-login");
    exit();
}

// Prevent back button access
header("Cache-Control: no-store, no-cache, must-revalidate, max-age=0");
header("Pragma: no-cache");
header("Expires: Wed, 11 Jan 1984 05:00:00 GMT");
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
async function fetchDashboardData() {
    try {
        const response = await fetch("/public/admin/models/dashboard_data.php", {
            method: "GET",
            headers: {
                "Content-Type": "application/json",
                "Accept": "application/json"
            }
        });

        const data = await response.json();

        if (!data) {
            console.error("No data received.");
            return;
        }

        document.getElementById("totalAdmins").textContent = data.totalAdmins;
        document.getElementById("totalMinistries").textContent = data.totalMinistries;
        document.getElementById("totalMembers").textContent = data.totalMembers;
        document.getElementById("totalPrayerRequests").textContent = data.totalPrayerRequests;

        document.getElementById("unreadMessages").textContent = data.unreadMessages;
        document.getElementById("upcomingEvents").textContent = data.upcomingEvents;
        document.getElementById("pendingAnnouncements").textContent = data.pendingAnnouncements;

        document.getElementById("totalMinistryApplications").textContent = data.totalMinistryApplications;
        document.getElementById("newMinistryApplications").textContent = data.newMinistryApplications;

        document.getElementById("totalSermons").textContent = data.totalSermons;
        document.getElementById("totalAudioSermons").textContent = data.totalAudioSermons;
        document.getElementById("totalImageSets").textContent = data.totalImageSets;

        // Display most recent sermon
        if (data.recentSermon) {
            document.getElementById("recentSermonTitle").textContent = data.recentSermon.title;
            document.getElementById("recentSermonSpeaker").textContent = data.recentSermon.speaker;
            document.getElementById("recentSermonDate").textContent = data.recentSermon.date;
        }

        // Display Top 3 Ministries
        const topMinistriesContainer = document.getElementById("topMinistries");
        topMinistriesContainer.innerHTML = "";
        data.topMinistries.forEach((ministry) => {
            const listItem = document.createElement("li");
            listItem.textContent = `${ministry.ministry_name} - Applications: ${ministry.count}`;
            topMinistriesContainer.appendChild(listItem);
        });

    } catch (error) {
        console.error("Error fetching dashboard data:", error);
    }
}

$(document).ready(function() {
    let lastPage = localStorage.getItem("admin_last_page") || "dashboard";

    $("#admin-content").html('<div class="text-gray-500 text-center mt-4">Loading...</div>');

    $("#admin-content").load("/public/admin/components/" + lastPage + ".php", function() {
        if (lastPage === "dashboard") {
            fetchDashboardData();
        }
    });

    $(".menu-item").click(function(event) {
        event.preventDefault();

        let page = $(this).data("page"); 
        localStorage.setItem("admin_last_page", page);

        $("#admin-content").fadeOut(200, function() {
            $("#admin-content").load("/public/admin/components/" + page + ".php", function() {
                $("#admin-content").fadeIn(200);

                if (page === "dashboard") {
                    fetchDashboardData();
                }
            });
        });
    });

    // **Handle clicking the logo to load dashboard without reload**
    $("#dashboard-logo").click(function(event) {
        event.preventDefault(); // Prevent full page reload

        let page = "dashboard";
        localStorage.setItem("admin_last_page", page);

        $("#admin-content").fadeOut(200, function() {
            $("#admin-content").load("/public/admin/components/" + page + ".php", function() {
                $("#admin-content").fadeIn(200);
                fetchDashboardData();
            });
        });
    });
});
</script>

</body>
</html>
