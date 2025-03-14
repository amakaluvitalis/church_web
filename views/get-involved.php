<?php
$pageTitle = "Get Involved";
include_once "includes/header.php";
?>

<!-- Main Content -->
<main class="flex-grow bg-[#d1b3b3] z-0 py-12 px-4 text-center mt-20 relative">
    <div class="absolute inset-0 bg-[#efe5e5] opacity-40"></div>
    <div class="relative z-1 max-w-4xl mx-auto text-white">
        <h2 class="text-4xl font-bold mb-6">Get Involved</h2>
        <p class="text-lg mb-12 max-w-2xl mx-auto">
            Discover meaningful ways to participate and contribute to our church community. Whether through giving, serving, or praying, there's a place for everyone to make a difference.
        </p>
    </div>

    <div class="relative z-10 container mx-auto grid md:grid-cols-2 lg:grid-cols-3 gap-10 text-left">
        
        <!-- Become a Member -->
        <div class="p-8 bg-[#efe5e5] bg-opacity-90 rounded-lg shadow-lg">
            <img src="public/images/members.png" alt="Become a Member" class="w-16 h-16 mb-4 mx-auto">
            <h3 class="text-2xl font-semibold text-[#660000]">Become a Member</h3>
            <p class="text-gray-700 mt-4">
                Join our church family and be part of a loving, faith-filled community. As a member, you will grow spiritually, connect with others, and actively participate in the life of our church.
            </p>
            <a href="become-member.php" class="mt-4 inline-block text-[#660000] font-bold">Join Now →</a>
        </div>

        <!-- Support by Giving -->
        <div class="p-8 bg-[#efe5e5] bg-opacity-90 rounded-lg shadow-lg">
            <img src="public/images/giving-icon.png" alt="Giving" class="w-20 h-20 mb-4 mx-auto">
            <h3 class="text-2xl font-semibold text-[#660000]">Support by Giving</h3>
            <p class="text-gray-700 mt-4">
                Your generous contributions help sustain our ministries, support the needy, and expand our outreach efforts. Every gift, no matter the size, makes an impact.
            </p>
            <a href="give.php" class="mt-4 inline-block text-[#660000] font-bold">Give Now →</a>
        </div>

        <!-- Go on Mission -->
        <div class="p-8 bg-[#efe5e5] bg-opacity-90 rounded-lg shadow-lg">
            <img src="public/images/mission-icon.png" alt="Mission" class="w-16 h-16 mb-4 mx-auto">
            <h3 class="text-2xl font-semibold text-[#660000]">Go on Mission</h3>
            <p class="text-gray-700 mt-4">
                Join us in reaching communities locally and globally, spreading the love of Christ through mission trips, evangelism, and community service projects.
            </p>
            <a href="#" class="mt-4 inline-block text-[#660000] font-bold">Join a Mission →</a>
        </div>

        <!-- Join Our Ministries -->
        <div class="p-8 bg-[#efe5e5] bg-opacity-90 rounded-lg shadow-lg">
            <img src="public/images/ministries-icon.png" alt="Ministries" class="w-16 h-16 mb-4 mx-auto">
            <h3 class="text-2xl font-semibold text-[#660000]">Join Our Ministries</h3>
            <p class="text-gray-700 mt-4">
                Whether it's the worship team, youth ministry, or outreach programs, there's a place for you to serve using your unique gifts and talents.
            </p>
            <a href="ministries.php" class="mt-4 inline-block text-[#660000] font-bold">Explore Ministries →</a>
        </div>

        <!-- Pray for the Ministry -->
        <div class="p-8 bg-[#efe5e5] bg-opacity-90 rounded-lg shadow-lg">
            <img src="public/images/prayer-icon.png" alt="Prayer" class="w-16 h-16 mb-4 mx-auto">
            <h3 class="text-2xl font-semibold text-[#660000]">Pray for the Ministry</h3>
            <p class="text-gray-700 mt-4">
                We believe in the power of prayer. Join us in lifting our leaders, missionaries, and community in prayer as we seek God's guidance and blessings.
            </p>
            <a href="prayer-line.php" class="mt-4 inline-block text-[#660000] font-bold">Join Prayer Team →</a>
        </div>

        <!-- Attend Our Events -->
        <div class="p-8 bg-[#efe5e5] bg-opacity-90 rounded-lg shadow-lg">
            <img src="public/images/events-icon.png" alt="Events" class="w-16 h-16 mb-4 mx-auto">
            <h3 class="text-2xl font-semibold text-[#660000]">Attend Our Events</h3>
            <p class="text-gray-700 mt-4">
                Stay connected by attending our church events, worship services, and special programs. There's always something for everyone to enjoy and grow in faith.
            </p>
            <a href="activities.php" class="mt-4 inline-block text-[#660000] font-bold">View Events →</a>
        </div>

    </div>
</main>

<?php include_once "includes/footer.php"; ?>
