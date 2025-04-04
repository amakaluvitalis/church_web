<?php 
include_once 'includes/header.php'; 
include_once 'routes/router.php';
include_once 'includes/models.php';

$heroContent = getHeroContent();
$visionMissionSlogan = getVisionMissionSlogan();
$notices = getNotices()
?>


<!-- Hero Section -->
<section id="hero-container" class="relative h-[55vh] lg:h-[75vh] overflow-hidden text-white">
    <!-- Hero Slides -->
    <?php if (!empty($heroContent)): ?>
        <?php foreach ($heroContent as $index => $hero) : ?>
            <div class="hero-slide <?= $index === 0 ? 'active' : '' ?>" 
                 data-text="<?= htmlspecialchars($hero['title']) ?>" 
                 data-subtext="<?= htmlspecialchars($hero['content']) ?>" 
                 style="background-image: url('<?= htmlspecialchars($hero['image_url']) ?>'); background-size: cover; background-position: top;">
            </div>
        <?php endforeach; ?>
    <?php else: ?>
        <p class="text-center text-red-500">⚠ No hero content available.</p>
    <?php endif; ?>

    <!-- Hero Text Container (Ensures Dynamic Updates) -->
    <div class="text-container bg-[#e0cccc]/80 p-4 rounded-md absolute bottom-6 left-1/2 transform -translate-x-1/2 w-[90%] md:w-[75%] max-w-lg">
        <h2 id="hero-title" class="text-2xl md:text-3xl font-bold text-center text-[#660000]">
            <?= !empty($heroContent) ? htmlspecialchars($heroContent[0]['title']) : 'Welcome' ?>
        </h2>
        <p id="hero-subtext" class="text-sm md:text-base text-center mt-2 text-white">
            <?= !empty($heroContent) ? htmlspecialchars($heroContent[0]['content']) : 'We are a place of faith and love.' ?>
        </p>
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
                    <img src="<?= htmlspecialchars($visionMissionSlogan[0]['image_url']) ?>" alt="Mission Icon" class="w-full h-full object-contain">
                </div>
                <div class="ml-6 border-l-4 border-[#660000] pl-6">
                    <h3 class="text-3xl font-bold text-[#660000] mb-3"><?= htmlspecialchars($visionMissionSlogan[0]['title']) ?></h3>
                    <p class="text-gray-700 leading-relaxed">
                        <?= htmlspecialchars($visionMissionSlogan[0]['content']) ?>
                    </p>
                </div>
            </div>

            <!-- Vision -->
            <div class="flex items-center bg-[#efe5e5] custom-shadow rounded-lg p-8">
                <div class="w-24 h-24 flex-shrink-0">
                    <img src="<?= htmlspecialchars($visionMissionSlogan[1]['image_url']) ?>" alt="Vision Icon" class="w-full h-full object-contain">
                </div>
                <div class="ml-6 border-l-4 border-[#660000] pl-6">
                    <h3 class="text-3xl font-bold text-[#660000] mb-3"><?= htmlspecialchars($visionMissionSlogan[1]['title']) ?></h3>
                    <p class="text-gray-700 leading-relaxed">
                        <?= htmlspecialchars($visionMissionSlogan[1]['content']) ?>
                    </p>
                </div>
            </div>
        </div>

        <!-- Slogan Section -->
        <div class="mt-12 text-center">
            <div class="flex items-center justify-center bg-[#efe5e5] custom-shadow rounded-lg p-8 max-w-3xl mx-auto">
                <!-- Slogan Icon -->
                <div class="w-24 h-24 flex-shrink-0">
                    <img src="<?= htmlspecialchars($visionMissionSlogan[2]['image_url']) ?>" alt="Slogan Icon" class="w-full h-full object-contain">
                </div>
                <!-- Slogan Content -->
                <div class="ml-6 border-l-4 border-[#660000] pl-6 text-left">
                    <h3 class="text-3xl font-bold text-[#660000] mb-4"><?= htmlspecialchars($visionMissionSlogan[2]['title']) ?></h3>
                    <div class="p-6 rounded-lg bg-gradient-to-r from-[#f8e8e8] to-[#e0cccc] shadow-lg">
                        <p class="text-2xl md:text-3xl font-semibold italic text-gray-700 leading-relaxed">
                            <span class="text-4xl md:text-5xl font-bold">“</span> 
                            <?= htmlspecialchars($visionMissionSlogan[2]['content']) ?>
                            <span class="text-4xl md:text-5xl font-bold">”</span>
                        </p>
                    </div>
                </div>
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
        <div class="h-20"></div>
    <!-- Flowing Notices Section -->
    <div class="bg-[#660000] text-white py-6 px-6 md:px-12 w-full overflow-hidden relative">
        <div id="marquee-container" class="relative w-full flex justify-center">
            <div id="carousel" class="relative w-[1200px] overflow-hidden">
                <div id="carousel-inner" class="flex space-x-6">
                    <?php foreach ($notices as $notice): ?>
                        <div class="carousel-item bg-white text-black px-6 py-3 rounded-lg shadow-md text-lg font-semibold min-w-[280px] max-w-[280px] text-center whitespace-normal">
                            <?php echo nl2br(htmlspecialchars($notice['notice_text'])); ?>
                        </div>
                    <?php endforeach; ?>
                </div>
            </div>
        </div>
    </div>
    </div>
</section>
<script>
document.addEventListener("DOMContentLoaded", function () {
    const carouselInner = document.getElementById("carousel-inner");
    const carouselItems = Array.from(carouselInner.children);
    const moveInterval = 3000; // Move every 3 seconds

    function moveCarousel() {
        // Get the first item
        let firstItem = carouselInner.children[0];

        // Apply transition to shift left
        carouselInner.style.transition = "transform 0.7s ease-in-out";
        carouselInner.style.transform = `translateX(-${firstItem.offsetWidth + 20}px)`;

        // After transition completes, move first item to end
        setTimeout(() => {
            carouselInner.style.transition = "none"; // Disable transition for repositioning
            carouselInner.appendChild(firstItem); // Move first item to end
            carouselInner.style.transform = "translateX(0)"; // Reset transform
        }, 700); // Match transition duration
    }

    let interval = setInterval(moveCarousel, moveInterval);

    // Pause on hover
    carouselInner.addEventListener("mouseenter", () => clearInterval(interval));

    // Resume when mouse leaves
    carouselInner.addEventListener("mouseleave", () => {
        interval = setInterval(moveCarousel, moveInterval);
    });
});
</script>
</body>
</html>