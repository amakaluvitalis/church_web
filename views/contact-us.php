<?php
$pageTitle = "Contact Us";
include_once "includes/header.php";
?>

<!-- Main Content -->
<main class="flex-grow bg-white py-12 px-4 text-center mt-20">
    <h2 class="text-4xl font-bold text-[#660000] mb-6">Contact Us</h2>
    <p class="text-gray-700 mb-12 text-lg">Reach out to us for any inquiries or assistance.</p>

    <div class="max-w-6xl mx-auto grid grid-cols-1 md:grid-cols-2 gap-12 text-left">
        <!-- Contact Details -->
        <div class="space-y-6">
            <!-- Address -->
            <div class="flex items-start gap-4 p-4 bg-[#efe5e5] bg-opacity-90 rounded-lg shadow-lg">
                <div class="text-[#660000] flex-shrink-0">
                    <svg class="w-10 h-10" fill="currentColor" viewBox="0 0 24 24">
                        <path d="M12 2C8.14 2 5 5.14 5 9c0 4.26 5.78 10.49 6.08 10.79.37.37.97.37 1.34 0 .3-.3 6.08-6.53 6.08-10.79 0-3.86-3.14-7-7-7zm0 13c-2.21 0-4-1.79-4-4 0-2.21 1.79-4 4-4s4 1.79 4 4c0 2.21-1.79 4-4 4zm0-6a2 2 0 1 0 .001 3.999A2 2 0 0 0 12 9z"/>
                    </svg>
                </div>
                <div>
                    <h4 class="text-xl font-semibold text-gray-800">Our Location</h4>
                    <p class="text-gray-600">Kisumu Busia RD, Maseno Municipality</p>
                </div>
            </div>

            <!-- Phone -->
            <div class="flex items-start gap-4 p-4 bg-[#efe5e5] bg-opacity-90 rounded-lg shadow-lg">
                <div class="text-[#660000] flex-shrink-0">
                    <svg class="w-10 h-10" fill="currentColor" viewBox="0 0 24 24">
                        <path d="M6.62 10.79a15.093 15.093 0 0 0 6.59 6.59l2.2-2.2a1.006 1.006 0 0 1 1.11-.27c1.16.39 2.42.6 3.68.6.55 0 1 .45 1 1V21c0 .55-.45 1-1 1C8.94 22 2 15.06 2 6c0-.55.45-1 1-1h3.5c.55 0 1 .45 1 1 0 1.26.21 2.52.6 3.68.17.44.09.94-.27 1.11l-2.21 2.2z"/>
                    </svg>
                </div>
                <div>
                    <h4 class="text-xl font-semibold text-gray-800">Call Us</h4>
                    <p class="text-gray-600">+254 (7) 960-20551</p>
                </div>
            </div>

            <!-- Email -->
            <div class="flex items-start gap-4 p-4 bg-[#efe5e5] bg-opacity-90 rounded-lg shadow-lg">
                <div class="text-[#660000] flex-shrink-0">
                    <svg class="w-10 h-10" fill="currentColor" viewBox="0 0 24 24">
                        <path d="M12 12.713l11.953-7.234C23.68 5.119 22.556 5 21.453 5H2.547C1.444 5 .32 5.119.047 5.479L12 12.713zM24 7.326l-12 7.249-12-7.249V19c0 1.104.896 2 2 2h20c1.104 0 2-.896 2-2V7.326z"/>
                    </svg>
                </div>
                <div>
                    <h4 class="text-xl font-semibold text-gray-800">Email Us</h4>
                    <p class="text-gray-600">contact@ackallsaintsmasenoparish.com</p>
                </div>
            </div>
        </div>

    <!-- Google Map -->
    <div class="w-full h-[250px] md:h-[300px] lg:h-[300px] overflow-hidden rounded-lg shadow-lg">
        <iframe 
            src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d1680.5017654517949!2d34.59835521404475!3d-0.0062290125386999925!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x182aa9f852d5b733%3A0x905e256cd388896!2sMaseno%20ACK%20Church!5e1!3m2!1sen!2ske!4v1740627894840!5m2!1sen!2ske" 
            class="w-full h-full" 
            style="border:0;" 
            allowfullscreen="" 
            loading="lazy" 
            referrerpolicy="no-referrer-when-downgrade">
        </iframe>
    </div>
    </div>

<!-- Contact Form Section -->
<section class="py-12">
    <div class="container mx-auto max-w-2xl bg-white shadow-lg rounded-lg p-6">
        <h3 class="text-2xl font-semibold text-[#660000] text-center mb-4">Send Us a Message</h3>
        <p class="text-gray-600 text-center mb-6">We would love to hear from you. Fill in the form below.</p>

        <form action="process-contact.php" method="POST">
            <div class="space-y-4">
                <!-- Full Name -->
                <div class="flex items-center space-x-4">
                    <label for="name" class="text-gray-800 font-semibold w-1/4">Full Name <span class="text-red-500">*</span></label>
                    <input type="text" id="name" name="name"
                        class="p-3 border border-[#660000] rounded-lg focus:outline-none focus:ring-2 focus:ring-[#660000] w-3/4"
                        placeholder="Enter your full name" required>
                </div>

                <!-- Email -->
                <div class="flex items-center space-x-4">
                    <label for="email" class="text-gray-800 font-semibold w-1/4">Email <span class="text-red-500">*</span></label>
                    <input type="email" id="email" name="email"
                        class="p-3 border border-[#660000] rounded-lg focus:outline-none focus:ring-2 focus:ring-[#660000] w-3/4"
                        placeholder="Enter your email address" required>
                </div>

                <!-- Message -->
                <div class="flex items-start space-x-4">
                    <label for="message" class="text-gray-800 font-semibold w-1/4 pt-2">Message <span class="text-red-500">*</span></label>
                    <textarea id="message" name="message" rows="5"
                        class="p-3 border border-[#660000] rounded-lg focus:outline-none focus:ring-2 focus:ring-[#660000] w-3/4"
                        placeholder="Enter your message" required></textarea>
                </div>

                <!-- Submit Button -->
                <div class="flex justify-center mt-4">
                    <button type="submit"
                        class="bg-[#660000] text-white py-3 px-6 rounded-lg hover:bg-[#993333] transition duration-300 font-semibold">
                        Send Message
                    </button>
                </div>
            </div>
        </form>
    </div>
</section>


</main>

<?php include_once "includes/footer.php"; ?>
