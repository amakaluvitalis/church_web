<?php 
$pageTitle = "Resources"; 
include_once "includes/header.php"; 
include_once "includes/models.php"; 
$sermons = getLatestSermons();
$audio_sermons = getLatestAudioSermons();
$galleries = getGallery();

?>

<!-- Main Content -->
<main class="flex-grow bg-white py-12 px-4 text-center mt-20 relative bg-cover bg-center bg-fixed" style="background-image: url('public/images/resources.jpg');">
    <!-- Translucent Overlay -->
    <div class="absolute inset-0 bg-[#efe5e5] bg-opacity-60"></div>

    <!-- Content Wrapper -->
    <div class="relative">
        

    <!-- YouTube Video Previews (Carousel style) -->
        <div class="mb-12">
                <h3 class="text-2xl font-semibold text-[#660000] mb-4">Watch Our Latest Sermons</h3>

                <!-- Carousel Container -->
                <div id="videoCarouselWrapper" class="relative overflow-hidden w-full">
                    <!-- Left Navigation Button -->
                    <button id="prevBtn" class="absolute left-2 top-1/2 transform -translate-y-1/2 z-10 bg-[#660000] bg-opacity-70 text-white p-2 rounded-full hover:bg-opacity-90">
                        &larr;
                    </button>

                    <!-- Right Navigation Button -->
                    <button id="nextBtn" class="absolute right-2 top-1/2 transform -translate-y-1/2 z-10 bg-[#660000] bg-opacity-70 text-white p-2 rounded-full hover:bg-opacity-90">
                        &rarr;
                    </button>

                    <div id="videoCarousel" class="flex transition-transform duration-700 ease-in-out">
            <?php foreach ($sermons as $sermon): ?>
                <div class="video-item flex-shrink-0 w-full md:w-1/2 px-2">
                    <div class="bg-[#e0cccc] shadow-lg rounded-lg p-4 text-left">
                        <!-- Title -->
                        <h4 class="text-lg md:text-xl font-bold text-[#660000] mb-2">
                            <?= htmlspecialchars($sermon['title']); ?>
                        </h4>

                        <!-- Date & Speaker Row -->
                        <div class="flex justify-between items-center text-gray-700 text-sm font-medium mb-2">
                            <!-- Date (Left) -->
                            <div class="flex items-center">
                                <img src="/public/images/bx-calendar.svg" alt="Calendar" class="w-5 h-5 mr-2">
                                <span><?= date("F d, Y", strtotime($sermon['date'])); ?></span>
                            </div>

                            <!-- Speaker (Right) -->
                            <div class="flex items-center">
                                <span><?= htmlspecialchars($sermon['speaker']); ?></span>
                                <img src="/public/images/speaker.png" alt="Speaker" class="w-6 h-6 ml-2">
                            </div>
                        </div>

                        <!-- YouTube Video -->
                        <iframe class="w-full h-[270px] md:h-[330px] rounded-md mt-2"
                            src="<?= htmlspecialchars($sermon['youtube_link']); ?>?rel=0&showinfo=0&modestbranding=1&enablejsapi=1"
                            frameborder="0" allowfullscreen>
                        </iframe>
                    </div>
                </div>
            <?php endforeach; ?>
        </div>

        </div>
    </div>


        <!-- Audio Sermons Section -->
        <div class="mb-12">
            <h3 class="text-2xl font-semibold text-[#660000] mb-4">Listen to Our Latest Sermons</h3>

            <div class="max-w-xl mx-auto overflow-y-auto max-h-96 border border-gray-300 rounded-lg shadow-lg">
                <table class="min-w-full border-collapse">
                    <thead class="bg-[#660000] text-white">
                        <tr>
                            <th class="py-3 px-4 text-left">Sermon Title</th>
                            <th class="py-3 px-4 text-left">Date</th>
                            <th class="py-3 px-4 text-left">Audio</th>
                        </tr>
                    </thead>
                    <tbody class="bg-white text-gray-700">
                        <?php foreach ($audio_sermons as $sermon): ?>
                            <tr class="border-b">
                                <td class="py-3 px-4"><?php echo htmlspecialchars($sermon['title']); ?></td>
                                <td class="py-3 px-4"><?php echo date("M d, Y", strtotime($sermon['date'])); ?></td>
                                <td class="py-3 px-4">
                                    <audio controls class="w-40">
                                        <source src="<?php echo htmlspecialchars($sermon['audio_file']); ?>" type="audio/mpeg">
                                    </audio>
                                </td>
                            </tr>
                        <?php endforeach; ?>
                    </tbody>
                </table>
            </div>
        </div>


        <!-- Gallery Section -->
        <section class="py-16 bg-white text-center">
            <div class="container mx-auto px-6 md:px-12">
                <h3 class="text-4xl font-bold text-[#660000] mb-6">Church Gallery</h3>

                <?php foreach ($galleries as $gallery) : ?>
                    <div class="mb-10">
                        <h4 class="text-2xl font-semibold text-[#660000] mb-4"><?= htmlspecialchars($gallery['category_name']) ?></h4>

                        <div class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-3 gap-4">
                            <img src="<?= htmlspecialchars($gallery['image1']) ?>" alt="Gallery Image 1" class="w-full h-auto object-cover rounded-lg shadow-lg">
                            <img src="<?= htmlspecialchars($gallery['image2']) ?>" alt="Gallery Image 2" class="w-full h-auto object-cover rounded-lg shadow-lg">
                            <img src="<?= htmlspecialchars($gallery['image3']) ?>" alt="Gallery Image 3" class="w-full h-auto object-cover rounded-lg shadow-lg">
                        </div>

                        <!-- More Button -->
                        <a href="<?= htmlspecialchars($gallery['drive_link']) ?>" target="_blank" 
                        class="mt-4 inline-block bg-[#660000] text-white py-2 px-6 rounded-md shadow-lg hover:bg-red-800 transition">
                            View More Photos
                        </a>
                    </div>
                <?php endforeach; ?>

            </div>
        </section>


    </div>
</main>

<script>
document.addEventListener("DOMContentLoaded", function () {
    const carousel = document.getElementById("videoCarousel");
    const videoItems = document.querySelectorAll(".video-item");
    const prevBtn = document.getElementById("prevBtn");
    const nextBtn = document.getElementById("nextBtn");

    let index = 0;
    let autoScrollInterval;

    function updateCarousel() {
        carousel.style.transition = "transform 700ms ease-in-out";
        carousel.style.transform = `translateX(-${index * videoItems[0].offsetWidth}px)`;
    }

    function startAutoScroll() {
        autoScrollInterval = setInterval(() => {
            index++;
            updateCarousel();
            if (index >= videoItems.length - 1) {
                setTimeout(() => {
                    carousel.style.transition = "none";
                    carousel.style.transform = "translateX(0px)";
                    index = 0;
                }, 700);
            }
        }, 5000);
    }
    startAutoScroll();

    prevBtn.addEventListener("click", () => {
        clearInterval(autoScrollInterval);
        index = Math.max(index - 1, 0);
        updateCarousel();
    });

    nextBtn.addEventListener("click", () => {
        clearInterval(autoScrollInterval);
        index = Math.min(index + 1, videoItems.length - 1);
        updateCarousel();
    });
});
</script>

<?php include_once "includes/footer.php"; ?>
