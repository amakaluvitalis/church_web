<?php 
$pageTitle = "Our Ministries"; 
include_once "includes/header.php";
include_once "includes/models.php";
echo "<script>console.log('Current Page: $current_page');</script>"; 
$ministries = getMinistries();
?>
<!-- Main Content -->
<main class="flex-grow bg-[#f0e6e6] py-12 px-4 text-center mt-20">
    <div class="container mx-auto px-6 md:px-12">
        <h2 class="text-4xl font-bold text-[#660000] mb-12">Our Ministries</h2>
        <p class="text-gray-700 mb-8 text-lg">
            At ACK All Saints Maseno Parish, we have various ministries that cater to different groups within our church, fostering spiritual growth, community service, and fellowship. Find a ministry that suits you and get involved!
        </p>

        <!-- Ministries Grid -->
        <div id="ministries" class="grid md:grid-cols-2 lg:grid-cols-3 gap-10 text-left">
            <?php foreach ($ministries as $ministry) : ?>
            <div class="relative group p-8 bg-center bg-cover bg-no-repeat rounded-lg shadow-lg transition-transform transform hover:scale-105 hover:shadow-2xl"
                style="background-image: url('<?php echo htmlspecialchars($ministry['bg_image']); ?>');">
                
                <div class="absolute inset-0 bg-[#e0cccc]/80 group-hover:bg-[#e0cccc]/60 transition duration-500"></div>
                
                <div class="relative z-10 text-center">
                    <h3 class="text-2xl font-semibold text-white">
                        <?php echo htmlspecialchars($ministry['name']); ?>
                    </h3>
                    <p class="text-white mt-4 opacity-0 group-hover:opacity-100 transition duration-500">
                        <?php echo nl2br(htmlspecialchars($ministry['description'])); ?>
                    </p>
                    <button class="mt-4 px-4 py-2 bg-[#660000] text-white rounded opacity-0 group-hover:opacity-100 transition duration-500"
                        onclick="openJoinModal('<?php echo addslashes($ministry['name']); ?>')">
                        Join
                    </button>
                </div>
            </div>
            <?php endforeach; ?>
        </div>

        <!-- Call to Action -->
        <div class="mt-12">
            <h3 class="text-2xl font-semibold text-[#660000] mb-4">Get Involved</h3>
            <p class="text-gray-700">
                Each ministry plays a vital role in our church community. If you feel called to serve, join any of our ministries and be part of our mission.
            </p>
            <a href="#ministries" class="mt-4 inline-block bg-[#660000] text-white px-6 py-3 rounded-md shadow-lg hover:bg-[#3d0000] transition">
                Join a Ministry
            </a>
        </div>
    <div id="message-wrapper" class="fixed inset-0 z-[100000] pointer-events-none flex items-start justify-center">
        <div id="response-message" class="mt-5">
    </div>
    </div>
</main>

<!-- Join Prayer Team Modal -->
<div id="joinModal" class="fixed inset-0 z-[9999] flex items-center justify-center bg-black bg-opacity-50 hidden">
    <div class="bg-white rounded-lg shadow-lg w-full max-w-md p-6">
        <div class="flex justify-between items-center mb-4">
            <h3 id="modalTitle" class="text-xl font-bold text-[#660000]">Join Prayer Team</h3>
            <button onclick="closeJoinModal()" class="text-gray-500 hover:text-gray-700">&times;</button>
        </div>
        <form id="joinForm" class="space-y-4">
            <input type="hidden" name="ministry_application" value="1">
            
            <div>
                <label for="fullName" class="block text-gray-700">Full Name</label>
                <input type="text" id="fullName" name="fullName"
                    class="mt-1 w-full p-2 border rounded-md focus:border-[#660000] focus:ring" required>
            </div>
            <div>
                <label for="emailJoin" class="block text-gray-700">Email</label>
                <input type="email" id="emailJoin" name="emailJoin"
                    class="mt-1 w-full p-2 border rounded-md focus:border-[#660000] focus:ring" required>
            </div>
            <div>
                <label for="phoneJoin" class="block text-gray-700">Phone</label>
                <input type="text" id="phoneJoin" name="phoneJoin"
                    class="mt-1 w-full p-2 border rounded-md focus:border-[#660000] focus:ring" required>
            </div>
            <div>
                <label for="ministryName" class="block text-gray-700">Ministry</label>
                <input type="text" id="ministryName" name="ministryName"
                    class="mt-1 w-full p-2 border rounded-md bg-gray-100" readonly>
            </div>
            <div class="flex justify-end">
                <button type="button" onclick="closeJoinModal()" class="mr-2 px-4 py-2 border rounded hover:bg-gray-200">Cancel</button>
                <button type="submit" class="px-4 py-2 bg-[#660000] text-white rounded hover:bg-[#550000]">Submit</button>
            </div>
        </form>

    </div>
</div>

<script>

$(document).ready(function() {
    $("#joinForm").submit(function(event) {
        event.preventDefault();

        let formData = $(this).serialize();

        $.ajax({
            url: "includes/models.php",
            type: "POST",
            data: formData,
            dataType: "json",
            success: function(response) {
                let messageHtml = `
                    <div class="bg-${response.status === 'success' ? 'green' : 'red'}-100 border border-${response.status === 'success' ? 'green' : 'red'}-400 text-${response.status === 'success' ? 'green' : 'red'}-700 px-4 py-3 rounded shadow-lg">
                        <strong class="font-bold">${response.status === 'success' ? 'Success!' : 'Error!'}</strong>
                        <span class="block sm:inline">${response.message}</span>
                    </div>
                `;

                $("#response-message").html(messageHtml).fadeIn();

                if (response.status === "success") {
                    $("#joinForm")[0].reset();
                    setTimeout(closeJoinModal, 500);
                }

                // Auto-hide message after 5 seconds
                setTimeout(function() {
                    $("#response-message").fadeOut("slow");
                }, 5000);
            },
            error: function() {
                $("#response-message").html(
                    `<div class="bg-red-100 border border-red-400 text-red-700 px-4 py-3 rounded shadow-lg">
                        <strong class="font-bold">Error!</strong>
                        <span class="block sm:inline">Something went wrong. Please try again.</span>
                    </div>`
                ).fadeIn();

                // Auto-hide error message after 5 seconds
                setTimeout(function() {
                    $("#response-message").fadeOut("slow");
                }, 5000);
            }
        });
    });
});


    function openJoinModal(ministryName) {
        document.getElementById("modalTitle").innerText = `Join ${ministryName}`;
        document.getElementById("ministryName").value = ministryName;
        document.getElementById("joinModal").classList.remove("hidden");
    }

    function closeJoinModal() {
        document.getElementById("joinModal").classList.add("hidden");
    }
</script>

<?php include_once "includes/footer.php"; ?>

