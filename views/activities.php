<?php
$pageTitle = "Activities";
include_once "includes/header.php";
?>

<!-- Main Content -->
<main class="flex-grow bg-white py-12 px-4 mt-20">
    <h2 class="text-4xl font-bold text-[#660000] text-center mb-6">Activities</h2>
    <p class="text-lg text-gray-700 text-center max-w-2xl mx-auto mb-12">
        Stay updated on our recent and upcoming events as we continue to grow in faith and community service.
    </p>

    <!-- Upcoming Events Section -->
    <section class="mb-20">
        <h3 class="text-3xl font-semibold text-center text-[#660000] mb-8">Upcoming Events</h3>

        <!-- Event Posters Carousel -->
        <div class="relative overflow-hidden max-w-5xl mx-auto">
            <div id="event-carousel" class="flex transition-transform duration-500 ease-in-out space-x-8">
                
                <!-- Event 1 -->
                <div class="relative w-full md:w-1/2 flex-shrink-0 event-item">
                    <img src="public/images/event1.jpg" alt="Event 1" class="w-full h-64 object-cover rounded-lg shadow-lg event-img">
                    <div class="absolute inset-0 flex justify-center items-center p-4 rounded-lg event-overlay">
                        <div class="bg-[#c19999] bg-opacity-60 text-white px-6 py-4 rounded-md">
                            <h3 class="text-2xl font-bold text-center">Street Worship</h3>
                            <p class="text-sm mt-2 text-center">Date: 7th and 8th March 2025</p>
                            <p class="text-sm text-center">Venue: Maseno Market Grounds</p>
                        </div>
                    </div>
                </div>

                <!-- Event 2 -->
                <div class="relative w-full md:w-1/2 flex-shrink-0 event-item">
                    <img src="public/images/event2.jpg" alt="Event 2" class="w-full h-64 object-cover rounded-lg shadow-lg event-img">
                    <div class="absolute inset-0 flex justify-center items-center p-4 rounded-lg event-overlay">
                        <div class="bg-[#c19999] bg-opacity-60 text-white px-6 py-4 rounded-md">
                            <h3 class="text-2xl font-bold text-center">Street Worship Service and Evangelism</h3>
                            <p class="text-sm mt-2 text-center">Date: 7th and 8th March 2025</p>
                            <p class="text-sm text-center">Venue: Maseno Market Grounds</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- Periodic Activities Section -->
    <section>
        <h3 class="text-3xl font-semibold text-center text-[#660000] mb-8">Periodic Activities</h3>

        <div class="container mx-auto space-y-16">
            <?php
            $activities = [
                ["outreach.JPG", "Community Outreach Program", "Our community outreach program aimed to support underprivileged families by providing food supplies, clothes, and essential services."],
                ["youth_camp.JPG", "Annual Youth Camp", "The annual youth camp was a time of spiritual growth, fun activities, and deep fellowship."],
                ["choir_concert.JPG", "Annual Choir Concert", "Our choir concert brought together voices in worship and celebration, showcasing the incredible talent within our church."],
                ["bible_study.JPG", "Weekly Bible Study Groups", "We organize weekly Bible study sessions to deepen our understanding of the Word of God."],
                ["charity.JPG", "Charity Fundraiser Event", "Our charity event successfully raised funds for our mission projects, supporting various humanitarian causes."],
                ["sunday_school.JPG", "Children's Sunday School", "Our Sunday School program focuses on teaching children biblical principles in a fun and engaging way."]
            ];

            $reverse = false;
            foreach ($activities as $activity) {
                $image = "public/images/" . $activity[0];
                $title = $activity[1];
                $description = $activity[2];
                ?>
                <div class="flex flex-col md:flex-row<?php echo $reverse ? '-reverse' : ''; ?> items-center">
                    <div class="md:w-1/2">
                        <img src="<?= $image ?>" alt="<?= $title ?>" class="w-full h-64 object-cover rounded-lg shadow-lg">
                    </div>
                    <div class="md:w-1/2 md:<?php echo $reverse ? 'pr' : 'pl'; ?>-12 text-left animate-fadeIn">
                        <h3 class="text-3xl font-semibold text-[#660000]"><?= $title ?></h3>
                        <p class="text-gray-800 mt-4"><?= $description ?></p>
                    </div>
                </div>
                <?php
                $reverse = !$reverse;
            }
            ?>
        </div>
    </section>
</main>

<!-- Carousel Script -->
<script>
    document.addEventListener("DOMContentLoaded", function () {
        const carousel = document.getElementById("event-carousel");
        let scrollAmount = 0;
        const slideWidth = carousel.children[0].offsetWidth + 32; // Get width + margin
        let carouselInterval;

        function slideCarousel() {
            scrollAmount += slideWidth;
            if (scrollAmount >= carousel.scrollWidth - carousel.offsetWidth) {
                carousel.appendChild(carousel.firstElementChild);
                scrollAmount = 0;
            }
            carousel.style.transform = `translateX(-${scrollAmount}px)`;
        }

        function startCarousel() {
            carouselInterval = setInterval(slideCarousel, 4000);
        }

        function stopCarousel() {
            clearInterval(carouselInterval);
        }

        const eventItems = document.querySelectorAll('.event-item');
        eventItems.forEach(item => {
            item.addEventListener('mouseenter', stopCarousel);
            item.addEventListener('mouseleave', startCarousel);
        });

        startCarousel();
    });
</script>

<?php include_once "includes/footer.php"; ?>
