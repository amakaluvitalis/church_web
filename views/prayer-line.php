<?php 
$pageTitle = "Prayer Line"; 
include_once "includes/header.php"; 
?>

<!-- Main Content -->
<main class="flex-grow bg-white py-12 px-4 text-center mt-20">
    <h2 class="text-2xl font-bold mb-4 text-[#660000]">Prayer Line</h2>
    <p class="text-gray-700 mb-8">
        We believe in the power of prayer. Share your prayer requests with us, and our team will stand with you in faith. Your contact details are optional, and all requests will be handled with care and confidentiality.
    </p>

    <!-- Prayer Form Section -->
    <section class="max-w-2xl mx-auto bg-gradient-to-t from-[#e6dcdc] to-[#f9f4f4] p-8 shadow-lg rounded-lg">
        <h3 class="text-xl font-semibold mb-6 text-[#a36666]">Prayer Request</h3>

        <form id="prayer-form" onsubmit="submitPrayerForm(event)" class="space-y-6">
            <!-- Prayer Request Field -->
            <div class="flex flex-col text-left">
                <label for="prayerRequest" class="text-sm font-medium text-gray-700">Prayer Request <span class="text-red-500">*</span></label>
                <textarea id="prayerRequest" name="prayerRequest" rows="4" required 
                    class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-[#660000] focus:ring-[#660000]"></textarea>
            </div>

            <!-- Email Field -->
            <div class="flex flex-col text-left">
                <label for="email" class="text-sm font-medium text-gray-700">Email (Optional)</label>
                <input type="email" id="email" name="email" placeholder="Your Email Address" 
                    class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-[#660000] focus:ring-[#660000]">
            </div>

            <!-- Phone Number Field -->
            <div class="flex flex-col text-left">
                <label for="phone" class="text-sm font-medium text-gray-700">Phone (Optional)</label>
                <input type="text" id="phone" name="phone" placeholder="Your Phone Number" 
                    class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-[#660000] focus:ring-[#660000]">
            </div>

            <!-- Submit Button -->
            <div class="flex justify-center">
                <button type="submit" class="bg-[#660000] text-white px-6 py-2 rounded-md shadow-md hover:bg-[#993333] transition">
                    Submit Prayer Request
                </button>
            </div>
        </form>

        <!-- Success Message (Hidden by Default) -->
        <div id="successMessage" class="hidden mt-6 text-green-600 font-semibold text-center">
            Thank you! Your prayer request has been submitted. Our team will pray for you.
        </div>
    </section>
</main>

<script>
    function submitPrayerForm(event) {
        event.preventDefault(); // Prevent default form submission

        // Show success message and clear form
        document.getElementById("successMessage").classList.remove("hidden");
        document.getElementById("prayer-form").reset();
    }
</script>

<?php include_once "includes/footer.php"; ?>
