<?php 
include_once 'includes/header.php'; 
include_once 'routes/router.php';
?>


<!-- Hero Section -->
<section id="hero-container" class="relative h-[55vh] lg:h-[75vh] overflow-hidden text-white">
    <!-- Hero Slides -->
    <div class="hero-slide active" data-text="Welcome to Our Church" data-subtext="We are a place of love, hope, and faith, where you can grow spiritually and connect with others." 
         style="background-image: url('public/images/hero1.jpg'); background-size: cover; background-position: top;"></div>

    <div class="hero-slide" data-text="Join Our Ministries" data-subtext="Our ministries provide opportunities to serve and engage with others in meaningful ways, from family support to praise and worship." 
         style="background-image: url('public/images/hero2.jpg'); background-size: cover; background-position: top;"></div>

    <div class="hero-slide" data-text="Get Involved" data-subtext="Whether through volunteering, donations, or participation, you can make a difference in our community and beyond." 
         style="background-image: url('public/images/hero3.jpg'); background-size: cover; background-position: top;"></div>

    <!-- Hero Text Container -->
    <div class="text-container bg-[#e0cccc]/80 p-4 rounded-md absolute bottom-6 left-1/2 transform -translate-x-1/2 w-[90%] md:w-[75%] max-w-lg">
        <h2 id="hero-title" class="text-2xl md:text-3xl font-bold text-center text-[#660000]"></h2>
        <p id="hero-subtext" class="text-sm md:text-base text-center mt-2 text-white"></p>
    </div>
</section>

<!-- Vision, Mission, Core Values Section -->
<section class="py-16 bg-[#f0e6e6] text-center">
    <div class="container mx-auto px-6 md:px-12">
        <h2 class="text-4xl font-bold text-[#660000] mb-12">Our Vision, Mission & Core Values</h2>
        <div class="grid md:grid-cols-2 gap-12">
            <!-- Mission -->
            <div class="flex items-center bg-[#efe5e5] custom-shadow rounded-lg p-8">
                <div class="w-24 h-24 flex-shrink-0">
                    <img src="public/images/mission.png" alt="Mission Icon" class="w-full h-full object-contain">
                </div>
                <div class="ml-6 border-l-4 border-[#660000] pl-6">
                    <h3 class="text-3xl font-bold text-[#660000] mb-3">Mission</h3>
                    <p class="text-gray-700 leading-relaxed">
                        Rigorously and vigorously evangelize the gospel by witnessing and transforming the spiritual
                        orientation of the congregants and proclamation of the salvation of Jesus Christ to all souls and believers.
                    </p>
                </div>
            </div>

            <!-- Vision -->
            <div class="flex items-center bg-[#efe5e5] custom-shadow rounded-lg p-8">
                <div class="w-24 h-24 flex-shrink-0">
                    <img src="public/images/vision.png" alt="Vision Icon" class="w-full h-full object-contain">
                </div>
                <div class="ml-6 border-l-4 border-[#660000] pl-6">
                    <h3 class="text-3xl font-bold text-[#660000] mb-3">Vision</h3>
                    <p class="text-gray-700 leading-relaxed">
                        To be an exemplary church of believers bound together by the love in Christ.
                    </p>
                </div>
            </div>
        </div>

        <!-- Slogan -->
        <div class="mt-12 text-center">
            <h3 class="text-3xl font-bold text-[#660000] mb-6">Slogan</h3>
            <div class="max-w-3xl mx-auto p-8 rounded-lg bg-gradient-to-r from-[#f8e8e8] to-[#e0cccc] shadow-lg">
                <p class="text-2xl md:text-3xl font-semibold italic text-gray-700">
                    <span class="text-4xl md:text-5xl font-bold">“</span> With Christ, we shall conquer all that we purpose to do.
                    <span class="text-4xl md:text-5xl font-bold">”</span>
                </p>
            </div>
        </div>

        <!-- Core Values -->
        <div class="mt-12 text-center">
            <h3 class="text-3xl font-bold text-[#660000] mb-6">Core Values</h3>
            <div class="flex flex-wrap justify-center gap-8">
                <!-- Core Values Hexagons -->
                <?php
                    $core_values = [
                        ["love-icon.png", "Love"],
                        ["discipleship-icon.png", "Discipleship"],
                        ["discernment-icon.png", "Discernment"],
                        ["compassion-icon.png", "Compassion"],
                        ["stewardship-icon.png", "Stewardship"]
                    ];
                    foreach ($core_values as $value) {
                        echo '<div class="w-40 h-40 bg-[#f0e6e6] text-[#660000] flex flex-col items-center justify-center font-semibold text-lg text-center shadow-md transition-transform hover:scale-105" 
                                style="clip-path: polygon(25% 0%, 75% 0%, 100% 50%, 75% 100%, 25% 100%, 0% 50%);">
                                <img src="public/images/'.$value[0].'" alt="'.$value[1].' Icon" class="w-14 h-14 mb-2">
                                <span>'.$value[1].'</span>
                            </div>';
                    }
                ?>
            </div>
        </div>
    </div>
</section>

<!-- Notice Board -->
<section class="py-20 bg-cover bg-center text-white" style="background-image: url('public/images/cross-1.gif');">
    <div class="container mx-auto px-6 md:px-12 text-center">
        <h3 class="text-3xl font-bold text-[#660000] mb-6">NOTICE BOARD</h3>
        <div class="grid md:grid-cols-2 gap-12 items-start">
            <!-- Featured Poster -->
            <div class="bg-[#efe5e5] bg-opacity-90 shadow-lg rounded-lg p-8 text-gray-800">
                <h3 class="text-2xl text-[#660000] mb-4">Poster of the Week</h3>
                <img src="public/images/event2.jpg" alt="Weekly Poster" class="w-full rounded-lg shadow-md">
            </div>

            <div class="bg-[#efe5e5] bg-opacity-90 shadow-lg rounded-lg p-8 text-gray-800">
                <h3 class="text-3xl font-bold text-[#660000] mb-6 text-center">Our Weekly Services</h3>
                <div class="divide-y divide-[#660000]/30">
                    <div class="py-4">
                        <h4 class="text-xl font-semibold text-[#660000]">Sunday</h4>
                        <ul class="mt-2 text-gray-700">
                            <li class="mt-1">6:00 AM - 7:00 AM: Morning Devotion</li>
                            <li class="mt-1">7:00 AM - 9:00 AM: 1st Service</li>
                            <li class="mt-1">10:00 AM - 12:00 PM: 2nd Service</li>
                            <li class="mt-1">2:00 PM - 5:00 PM: Scheme Fellowship</li>
                            <li class="mt-1">3:00 PM - 5:00 PM: Bible Study</li>
                        </ul>
                    </div>

                    <div class="py-4">
                        <h4 class="text-xl font-semibold text-[#660000]">Tuesday</h4>
                        <ul class="mt-2 text-gray-700">
                            <li class="mt-1">5:00 PM - 6:00 PM: Intercessory Prayers</li>
                        </ul>
                    </div>

                    <div class="py-4">
                        <h4 class="text-xl font-semibold text-[#660000]">Wednesday (Midweek Service)</h4>
                        <ul class="mt-2 text-gray-700">
                            <li class="mt-1">6:30 AM - 7:30 AM: Morning Service</li>
                            <li class="mt-1">5:30 PM - 6:30 PM: Evening Service</li>
                        </ul>
                    </div>

                    <div class="py-4">
                        <h4 class="text-xl font-semibold text-[#660000]">Friday</h4>
                        <ul class="mt-2 text-gray-700">
                            <li class="mt-1">6:00 PM - 7:00 PM: Youth Fellowship</li>
                        </ul>
                    </div>
                </div>
            </div>


        </div>
    </div>
</section>
<?php include_once "includes/footer.php"; ?>
<?php include_once "includes/announcements.php"; ?>
</body>
</html>
