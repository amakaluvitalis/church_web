<?php
include_once "models.php"; 

$contact = getContactInfo();
$giving = getGivingOfferings();
$socials = getSocialLinks();

?>

<!-- Footer -->
<footer class="relative bg-contain bg-cover bg-center text-[#3d0000] py-12" 
        style="background-image: url('public/images/footer.jpg');">
    
    <!-- Background Overlay -->
    <div class="absolute inset-0 bg-gradient-to-t from-[#c9bfcc]"></div>

    <div class="relative container mx-auto px-6">
        <div class="grid md:grid-cols-4 gap-8 mb-8">
            
            <!-- Contact Information -->
            <div class="text-left">
                <h3 class="text-2xl font-semibold mb-4">Contact Us</h3>
                <p class="mb-2"><strong>Location:</strong> <?= htmlspecialchars($contact['location']) ?></p>
                <p class="mb-2"><strong>Phone:</strong> <?= htmlspecialchars($contact['phone']) ?></p>
                <p><strong>Email:</strong> <?= htmlspecialchars($contact['email']) ?></p>
            </div>

            <!-- Giving & Offerings -->
            <div id="giving" class="bg-white p-6 rounded-lg shadow-md border border-gray-300 text-center">
                <img src="public/images/donation.png" alt="Giving Icon" class="w-12 h-12 mx-auto mb-3">
                <h3 class="text-2xl font-bold text-[#660000] mb-2">Giving & Offerings</h3>
                <p class="text-xl font-semibold text-gray-800">Till Number: <span class="text-[#660000] font-bold"><?= htmlspecialchars($giving['till_number']) ?></span></p>
                <p class="text-sm text-gray-600 mt-2">Assistance? Call: <strong class="text-gray-900"><?= htmlspecialchars($giving['assistance_phone']) ?></strong></p>
            </div>

            <!-- Prayer Line Button -->
            <div class="flex justify-center items-center">
                <a href="/?page=prayer-line" 
                   class="px-6 py-3 bg-[#660000] text-white rounded-lg hover:bg-[#d1b3b3] shadow-md transition flex items-center space-x-3">
                    <img src="public/images/pray.png" alt="Prayer Icon" class="w-8 h-8">
                    <span class="text-lg font-semibold">Prayer Line</span>
                </a>
            </div>

            <!-- Quick Links -->
            <div class="text-left">
                <h3 class="text-2xl font-semibold mb-4">Quick Links</h3>
                <ul class="grid grid-cols-2 gap-2 text-sm sm:text-base">
                    <li><a href="/?page=home" class="hover:text-gray-400">Home</a></li>
                    <li><a href="/?page=who-we-are" class="hover:text-gray-400">Who We Are</a></li>
                    <li><a href="/?page=history" class="hover:text-gray-400">History</a></li>
                    <li><a href="/?page=administration" class="hover:text-gray-400">Administration</a></li>
                    <li><a href="/?page=governance" class="hover:text-gray-400">Governance</a></li>
                    <li><a href="/?page=ministries" class="hover:text-gray-400">Ministries</a></li>
                    <li><a href="/?page=activities" class="hover:text-gray-400">Activities</a></li>
                    <li><a href="/?page=resources" class="hover:text-gray-400">Resources</a></li>
                    <li><a href="/?page=get-involved" class="hover:text-gray-400">Get Involved</a></li>
                    <li><a href="/?page=contact-us" class="hover:text-gray-400">Contact Us</a></li>
                    <li><a href="/?page=become-member" class="hover:text-gray-400">Join Us</a></li>
                    <li><a href="/?page=prayer-line" class="hover:text-gray-400">Prayer Line</a></li>
                </ul>
            </div>

        </div>

        <!-- Social Media Links -->
        <div class="text-center mt-6">
            <h3 class="text-2xl font-semibold mb-4">Follow Us</h3>
            <div class="flex justify-center space-x-4">
                <?php foreach ($socials as $social): ?>
                    <a href="<?= htmlspecialchars($social['url']) ?>" target="_blank" class="hover:text-gray-400">
                        <img src="<?= htmlspecialchars($social['icon']) ?>" alt="<?= htmlspecialchars($social['platform']) ?>" class="w-10 h-10">
                    </a>
                <?php endforeach; ?>
            </div>
        </div>

        <!-- Footer Bottom: Copyright & Developer -->
        <div class="border-t border-[#660000] pt-6 text-center md:flex md:justify-between md:items-center mt-6">
            <!-- Copyright -->
            <p class="text-xs md:text-sm text-[#660000] leading-tight">
                &copy; 2025 ACK ALL SAINTS MASENO PARISH. All Rights Reserved.
            </p>

            <!-- Developed By -->
            <p class="text-xs md:text-sm text-[#660000] flex items-center justify-center md:justify-start space-x-2 mt-2 md:mt-0">
                <span>Developed by</span> 
                <img src="public/images/coding-icon.png" alt="Coding Icon" class="w-4 h-4 md:w-5 md:h-5 inline">
                <a href="https://github.com/MerVitz" target="_blank" class="text-[#660000] hover:text-[#e0cccc]">Amakalu Vitalis</a>
            </p>
        </div>

    </div>
</footer>
<script>
document.addEventListener("DOMContentLoaded", function () {
    // Handle Image Download
    document.querySelectorAll(".download-btn").forEach(button => {
        button.addEventListener("click", function () {
            const imageUrl = this.getAttribute("data-url");
            const fileName = imageUrl.split('/').pop();

            fetch(imageUrl)
                .then(response => response.blob())
                .then(blob => {
                    const link = document.createElement("a");
                    link.href = URL.createObjectURL(blob);
                    link.download = fileName;
                    link.click();
                })
                .catch(error => console.error("Download failed:", error));
        });
    });

    const toggleButton = document.getElementById("toggleButton");
    const closeButton = document.getElementById("closePanel");
    const floatingButton = document.getElementById("floatingButton");
    const notificationPanel = document.getElementById("notificationPanel");

    // Make sure the floating button appears
    floatingButton.classList.remove("hidden");

    // Toggle notifications panel
    toggleButton.addEventListener("click", function () {
        notificationPanel.style.right = "10px"; // Slide into view
    });

    // Close panel
    closeButton.addEventListener("click", function () {
        notificationPanel.style.right = "-320px"; // Hide panel
    });
});
</script>
</body>
</html>
