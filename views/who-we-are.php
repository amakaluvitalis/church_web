<?php 
$pageTitle = "Who We Are"; 
include_once "includes/header.php"; 
?>

<!-- Main Content -->
<main class="flex-grow bg-white py-12 px-4 mt-20 relative">
    <!-- Background Image with Gradient Overlay (Hidden on Large Screens) -->
    <div class="absolute inset-0 bg-gradient-to-r from-[#d1b2b2]/90 to-transparent md:hidden">
        <img 
            src="public/images/we.jpg" 
            alt="Church Community" 
            class="w-full h-full object-cover opacity-20"
        >
    </div>

    <!-- Content Section -->
    <div class="relative container mx-auto text-left md:flex items-center">
        <!-- Text Section -->
        <div class="md:w-1/2 px-6">
            <h2 class="text-4xl font-bold text-[#660000] mb-6">Who We Are</h2>
            <p class="text-lg text-gray-800 leading-relaxed mb-4">
                All Saints’ Church Maseno is a Christ-centered Anglican community rooted in worship, discipleship, and service. 
                Our rich history traces back to early missionary work in Maseno, shaping our faith and traditions. 
                We embrace both spiritual and infrastructural growth, integrating modern technology in worship and evangelism while 
                fostering unity through ministries such as Sunday School, Youth Ministry, Mothers' Union, and Praise & Worship. 
                Guided by our 2024-2028 strategic plan, we are committed to faith-driven transformation, sustainability, and community service, 
                ensuring a lasting impact for generations to come.
            </p>
            <a href="contact-us.php" class="mt-4 inline-block bg-[#660000] text-white px-6 py-3 rounded-md shadow-lg hover:bg-[#3d0000]">
                Get Involved
            </a>
        </div>

        <!-- Image Section (Visible on Large Screens) -->
        <div class="hidden md:block md:w-1/2 px-6">
            <img 
                src="public/images/we.jpg" 
                alt="Church Community" 
                class="rounded-lg shadow-lg w-full h-auto"
            >
        </div>
    </div>
</main>

<?php include_once "includes/footer.php"; ?>