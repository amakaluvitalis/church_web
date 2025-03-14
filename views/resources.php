<?php 
$pageTitle = "Resources"; 
include_once "includes/header.php"; 
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
                    <!-- Video 1 -->
                    <div class="video-item flex-shrink-0 w-full md:w-1/2 px-2">
                        <div class="bg-[#e0cccc] shadow-lg rounded-lg p-4 text-left">
                            <h4 class="text-lg md:text-xl font-bold text-[#660000]">The Power of Faith</h4>
                            <p class="text-sm text-gray-600">📅 Jan 14, 2024</p>
                            <iframe class="w-full h-[270px] md:h-[330px] rounded-md mt-2"
                                src="https://www.youtube.com/embed/75_ipUyonyA?rel=0&showinfo=0&modestbranding=1&enablejsapi=1"
                                frameborder="0" allowfullscreen>
                            </iframe>
                        </div>
                    </div>

                    <!-- Video 2 -->
                    <div class="video-item flex-shrink-0 w-full md:w-1/2 px-2">
                        <div class="bg-[#e0cccc] shadow-lg rounded-lg p-4 text-left">
                            <h4 class="text-lg md:text-xl font-bold text-[#660000]">Walking in Grace</h4>
                            <p class="text-sm text-gray-600">📅 Jan 21, 2024</p>
                            <iframe class="w-full h-[270px] md:h-[330px] rounded-md mt-2"
                                src="https://www.youtube.com/embed/x3gomNVHoIU?rel=0&showinfo=0&modestbranding=1&enablejsapi=1"
                                frameborder="0" allowfullscreen>
                            </iframe>
                        </div>
                    </div>
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
                        <tr class="border-b">
                            <td class="py-3 px-4">Sunday Sermon</td>
                            <td class="py-3 px-4">Jan 14, 2024</td>
                            <td class="py-3 px-4">
                                <audio controls class="w-40">
                                    <source src="https://www.soundhelix.com/examples/mp3/SoundHelix-Song-1.mp3" type="audio/mpeg">
                                </audio>
                            </td>
                        </tr>
                    </tbody>
                </table>
            </div>
        </div>

        <!-- Gallery Section -->
        <section class="py-16 bg-white text-center">
            <div class="container mx-auto px-6 md:px-12">
                <h3 class="text-4xl font-bold text-[#660000] mb-6">Church Gallery</h3>

                <div class="grid grid-cols-2 sm:grid-cols-3 md:grid-cols-4 gap-4">
                    <div class="relative group">
                        <img src="public/images/gallery1.JPG" alt="Church Event" class="w-full h-auto object-cover rounded-lg shadow-lg">
                        <a href="public/images/gallery1.JPG" download class="absolute bottom-2 right-2">
                            <img src="public/images/download.png" alt="Download" class="w-6 h-6 opacity-80 hover:opacity-100 transition duration-300">
                        </a>
                    </div>

                    <div class="relative group">
                        <img src="public/images/gallery2.JPG" alt="Church Worship" class="w-full h-auto object-cover rounded-lg shadow-lg">
                        <a href="public/images/gallery2.JPG" download class="absolute bottom-2 right-2">
                            <img src="public/images/download.png" alt="Download" class="w-6 h-6 opacity-80 hover:opacity-100 transition duration-300">
                        </a>
                    </div>
                </div>
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
