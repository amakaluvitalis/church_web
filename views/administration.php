<?php
$pageTitle = "Administration";
include_once "includes/header.php";
?>

<!-- Main Content -->
<main class="flex-grow bg-white py-12 px-4 text-center mt-20">
    <h2 class="text-4xl font-bold text-[#660000] text-center mb-6">Administration</h2>
    <p class="text-lg text-gray-700 text-center max-w-2xl mx-auto mb-12">
        Meet our dedicated leaders who guide and manage the Anglican Church of Kenya. 
        Together, they ensure the spiritual, administrative, and operational success of our church.
    </p>

    <!-- The Big Four -->
    <section class="mb-12">
        <h3 class="text-3xl font-semibold text-center text-[#a36666] mb-6">The Big Four</h3>
        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-8">
            <?php
            $bigFour = [
                ["leader1.jpg", "Rev. John Mwangi", "Archbishop", "Archbishop John Mwangi oversees the spiritual vision and leadership of the Anglican Church, guiding us with faith and integrity."],
                ["leader2.jpg", "Canon Grace Atieno", "Bishop", "Bishop Grace Atieno leads the Diocese with compassion and wisdom, ensuring growth and development within the church."],
                ["leader3.jpg", "Rev. Peter Kamau", "Dean", "Dean Peter Kamau focuses on liturgical excellence and theological education, nurturing the faith of our congregation."],
                ["leader4.jpg", "Elder Sarah Nyambura", "Church Secretary", "Sarah Nyambura manages church records and communications, ensuring smooth operations within the organization."]
            ];

            foreach ($bigFour as $leader) {
                ?>
                <div class="bg-gradient-to-t from-[#e6dcdc] to-[#f9f4f4] shadow-lg rounded-tl-none rounded-tr-3xl rounded-br-none rounded-bl-3xl p-5">
                    <div class="overflow-hidden mx-auto w-32 h-32 mb-4 border-4 border-[#660000] rounded-full">
                        <img src="public/images/<?= $leader[0] ?>" alt="<?= $leader[1] ?>" class="w-full h-full object-cover">
                    </div>
                    <h4 class="text-lg font-bold text-[#660000]"><?= $leader[1] ?></h4>
                    <p class="text-sm text-gray-700"><?= $leader[2] ?></p>
                    <p class="text-sm text-gray-600 mt-2"><?= $leader[3] ?></p>
                </div>
                <?php
            }
            ?>
        </div>
    </section>

    <!-- Senior Leaders -->
    <section class="mb-12">
        <h3 class="text-3xl font-semibold text-center text-[#a36666] mb-6">Senior Leaders</h3>
        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-8">
            <?php
            $seniorLeaders = [
                ["leader5.jpg", "Rev. George Ochieng", "Youth Pastor", "George Ochieng ministers to the youth, providing guidance and mentorship to inspire the next generation."],
                ["leader6.jpg", "Ms. Margaret Achieng", "Treasurer", "Margaret Achieng oversees church finances with integrity, ensuring transparency and accountability in financial matters."],
                ["leader7.jpg", "Elder Patrick Otieno", "Music Director", "Patrick Otieno leads the music ministry, cultivating an atmosphere of worship and praise in the church."],
                ["leader8.jpg", "Ms. Rose Nyakio", "Event Coordinator", "Rose Nyakio coordinates church events, ensuring they are meaningful, organized, and impactful."]
            ];

            foreach ($seniorLeaders as $leader) {
                ?>
                <div class="bg-gradient-to-t from-[#e6dcdc] to-[#f9f4f4] shadow-lg rounded-tl-none rounded-tr-3xl rounded-br-none rounded-bl-3xl p-5">
                    <div class="overflow-hidden mx-auto w-32 h-32 mb-4 border-4 border-[#660000] rounded-full">
                        <img src="public/images/<?= $leader[0] ?>" alt="<?= $leader[1] ?>" class="w-full h-full object-cover">
                    </div>
                    <h4 class="text-lg font-bold text-[#660000]"><?= $leader[1] ?></h4>
                    <p class="text-sm text-gray-700"><?= $leader[2] ?></p>
                    <p class="text-sm text-gray-600 mt-2"><?= $leader[3] ?></p>
                </div>
                <?php
            }
            ?>
        </div>
    </section>

    <!-- Church Committee -->
    <section class="mb-12">
        <h3 class="text-3xl font-semibold text-center text-[#a36666] mb-6">Church Committee</h3>
        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-8">
            <?php
            $churchCommittee = [
                ["leader9.jpg", "Rev. James Onyango", "Committee Chair", "James Onyango chairs the church committee, ensuring efficient planning and decision-making."],
                ["leader10.jpg", "Ms. Faith Mutua", "Outreach Coordinator", "Faith Mutua oversees community outreach programs, ensuring the church remains a beacon of hope."],
                ["leader11.jpg", "Elder Simon Wanjiru", "Facilities Manager", "Simon Wanjiru manages church facilities, ensuring they are clean, safe, and welcoming."],
                ["leader12.jpg", "Ms. Lucy Wambui", "Prayer Coordinator", "Lucy Wambui leads the prayer ministry, fostering spiritual growth and unity in the church."]
            ];

            foreach ($churchCommittee as $leader) {
                ?>
                <div class="bg-gradient-to-t from-[#e6dcdc] to-[#f9f4f4] shadow-lg rounded-tl-none rounded-tr-3xl rounded-br-none rounded-bl-3xl p-5">
                    <div class="overflow-hidden mx-auto w-32 h-32 mb-4 border-4 border-[#660000] rounded-full">
                        <img src="public/images/<?= $leader[0] ?>" alt="<?= $leader[1] ?>" class="w-full h-full object-cover">
                    </div>
                    <h4 class="text-lg font-bold text-[#660000]"><?= $leader[1] ?></h4>
                    <p class="text-sm text-gray-700"><?= $leader[2] ?></p>
                    <p class="text-sm text-gray-600 mt-2"><?= $leader[3] ?></p>
                </div>
                <?php
            }
            ?>
        </div>
    </section>
</main>

<?php include_once "includes/footer.php"; ?>
