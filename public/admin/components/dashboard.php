<?php
if (session_status() == PHP_SESSION_NONE) {
    session_start();
}
if (!isset($_SESSION['admin'])) {
    header("Location: /public/admin/views/login.php");
    exit();
}
?>

<div class="grid grid-cols-1 md:grid-cols-3 gap-6">
    <div class="bg-white shadow-lg rounded-lg p-6">
        <h3 class="text-lg font-semibold text-gray-800">Total Users</h3>
        <p class="text-3xl font-bold text-[#660000]">1,245</p>
    </div>

    <div class="bg-white shadow-lg rounded-lg p-6">
        <h3 class="text-lg font-semibold text-gray-800">Total Posts</h3>
        <p class="text-3xl font-bold text-[#660000]">320</p>
    </div>

    <div class="bg-white shadow-lg rounded-lg p-6">
        <h3 class="text-lg font-semibold text-gray-800">Total Donations</h3>
        <p class="text-3xl font-bold text-[#660000]">$4,500</p>
    </div>
</div>
<div class="mt-8">
        <!-- Include Analytics Component -->
        <?php include_once "analytics.php"; ?>
</div>