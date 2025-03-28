<?php
$pageTitle = "Become a Member";
include_once "includes/header.php";
include_once "includes/models.php";
$welcome = getWelcomeMessage();
// Call the function and store the message
$submissionMessage = handleMembershipSubmission();
?>

<!-- Main Content -->
<main class="flex-grow bg-white py-12 px-4 text-center mt-20">

    <!-- Welcome Message Section -->
    <section class="py-16">
        <div class="container mx-auto px-6 md:px-12">
            <div class="max-w-4xl mx-auto bg-white rounded-lg p-8 shadow-lg">
                <div class="flex flex-col md:flex-row items-center md:items-start space-y-6 md:space-y-0 md:space-x-8">

                    <!-- Vicar's Image (Left Side) -->
                    <div class="flex-shrink-0">
                        <img src="<?= $welcome['image'] ?>" alt="<?= $welcome['vicar_name'] ?>" 
                            class="w-48 h-48 rounded-full object-cover shadow-md border-4 border-[#660000]">
                    </div>

                    <!-- Message from the Vicar (Right Side) -->
                    <div class="text-center md:text-left">
                        <h3 class="text-3xl font-semibold text-[#660000] mb-4">
                            Message From The <?= $welcome['title'] ?> - <?= $welcome['vicar_name'] ?>
                        </h3>
                        <p class="text-lg text-gray-600">
                            <?= nl2br($welcome['message']) ?>
                        </p>
                    </div>

                </div>
            </div>
        </div>
    </section>

    <!-- Become a Member Section -->
    <section class="py-16">
        <div class="container mx-auto px-4 md:px-12 text-center">
            <h2 class="text-3xl md:text-4xl font-bold text-[#660000] mb-6 md:mb-8">Become a Member</h2>

            <!-- Call to Action: Join Now (Form Section) -->
            <div class="bg-white shadow-lg rounded-lg p-6 md:p-8 max-w-2xl mx-auto">
                <h3 class="text-2xl md:text-3xl font-semibold text-[#660000] mb-4">Ready to Join?</h3>
                <p class="text-base md:text-lg text-gray-600 mb-6">
                    Joining our church family is easy! Fill out the form below to get started, and a member of our team
                    will reach out to welcome you personally.
                </p>

        <!-- Membership Form -->
        <form id="membership-form" method="POST" class="bg-white">
            <div class="space-y-4">
                <!-- Full Name -->
                <div class="flex flex-col md:flex-row md:items-center md:space-x-4">
                    <label for="full-name" class="text-gray-800 text-base md:text-lg font-semibold w-full md:w-32 text-left md:text-right">
                        Full Name <span class="text-red-500">*</span>
                    </label>
                    <input type="text" id="full-name" name="full-name"
                        class="p-3 border border-[#660000] rounded-lg focus:outline-none focus:ring-2 focus:ring-[#660000] w-full"
                        placeholder="Enter your full name" required>
                </div>

                <!-- Email Address -->
                <div class="flex flex-col md:flex-row md:items-center md:space-x-4">
                    <label for="email" class="text-gray-800 text-base md:text-lg font-semibold w-full md:w-32 text-left md:text-right">
                        Email <span class="text-red-500">*</span>
                    </label>
                    <input type="email" id="email" name="email"
                        class="p-3 border border-[#660000] rounded-lg focus:outline-none focus:ring-2 focus:ring-[#660000] w-full"
                        placeholder="Enter your email address" required>
                </div>

                <!-- Phone Number -->
                <div class="flex flex-col md:flex-row md:items-center md:space-x-4">
                    <label for="phone" class="text-gray-800 text-base md:text-lg font-semibold w-full md:w-32 text-left md:text-right">
                        Phone <span class="text-red-500">*</span>
                    </label>
                    <div class="flex border border-[#660000] rounded-lg overflow-hidden w-full">
                        <select id="country-code" name="country-code"
                            class="bg-gray-100 px-3 py-3 border-r border-[#660000] text-gray-700 focus:outline-none w-1/4 min-w-[100px]">
                            <option value="+254">+254</option>
                            <option value="+255">+255</option>
                            <option value="+256">+256</option>
                            <option value="+260">+260</option>
                            <option value="+1">+1 (USA)</option>
                            <option value="+44">+44 (UK)</option>
                            <option value="+234">+234 (Nigeria)</option>
                        </select>
                        <input type="tel" id="phone" name="phone"
                            class="p-3 focus:outline-none focus:ring-2 focus:ring-[#660000] w-3/4"
                            placeholder="Enter phone number" required>
                    </div>
                </div>

                <!-- Location -->
                <div class="flex flex-col md:flex-row md:items-center md:space-x-4">
                    <label for="location" class="text-gray-800 text-base md:text-lg font-semibold w-full md:w-32 text-left md:text-right">
                        Location <span class="text-red-500">*</span>
                    </label>
                    <input type="text" id="location" name="location"
                        class="p-3 border border-[#660000] rounded-lg focus:outline-none focus:ring-2 focus:ring-[#660000] w-full"
                        placeholder="Enter your location" required>
                </div>
            </div>

            <!-- Submit Button -->
            <div class="flex justify-center mt-6">
                <button type="submit"
                    class="w-full md:w-1/2 bg-[#660000] text-white py-3 rounded-lg hover:bg-[#993333] transition duration-300 font-semibold">
                    Submit Application
                </button>
            </div>
        </form>

        <!-- ✅ Success/Error Message Appears Here -->
        <div id="response-message" class="mt-6"></div>

            </div>
        </div>
    </section>
</main>
<?php if (isset($_GET["success"])): ?>
    <div class="bg-green-100 border border-green-400 text-green-700 px-4 py-3 rounded relative max-w-2xl mx-auto mt-6">
        <strong class="font-bold">Success!</strong>
        <span class="block sm:inline">Your membership application has been received.</span>
    </div>
<?php endif; ?>

<?php if (isset($_GET["error"])): ?>
    <div class="bg-red-100 border border-red-400 text-red-700 px-4 py-3 rounded relative max-w-2xl mx-auto mt-6">
        <strong class="font-bold">Error!</strong>
        <span class="block sm:inline">Something went wrong. Please try again.</span>
    </div>
<?php endif; ?>
<script>
    $(document).ready(function() {
        $("#membership-form").submit(function(event) {
            event.preventDefault(); // Prevent page reload

            var formData = $(this).serialize() + "&ajax=1"; // Add 'ajax' flag

            $.ajax({
                url: "includes/models.php",
                type: "POST",
                data: formData,
                dataType: "json",
                success: function(response) {
                    // ✅ Update Message Below the Form
                    $("#response-message").html(
                        `<div class="bg-${response.status === 'success' ? 'green' : 'red'}-100 border border-${response.status === 'success' ? 'green' : 'red'}-400 text-${response.status === 'success' ? 'green' : 'red'}-700 px-4 py-3 rounded relative max-w-2xl mx-auto">
                            <strong class="font-bold">${response.status === 'success' ? 'Success!' : 'Error!'}</strong>
                            <span class="block sm:inline">${response.message}</span>
                        </div>`
                    );

                    if (response.status === "success") {
                        $("#membership-form")[0].reset();
                    }

                    setTimeout(function() {
                        $("#response-message").fadeOut("slow");
                    }, 5000);
                },
                error: function() {
                    $("#response-message").html(
                        `<div class="bg-red-100 border border-red-400 text-red-700 px-4 py-3 rounded relative max-w-2xl mx-auto">
                            <strong class="font-bold">Error!</strong>
                            <span class="block sm:inline">Something went wrong. Please try again.</span>
                        </div>`
                    );
                }
            });
        });
    });
</script>

<?php include_once "includes/footer.php"; ?>

