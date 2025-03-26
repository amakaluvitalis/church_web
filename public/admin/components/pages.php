<?php
session_start();
if (!isset($_SESSION['admin'])) {
    header("Location: ../login.php");
    exit();
}

include_once __DIR__ . "/../../../includes/db.php";

$errorMessage = "";
$pages = [];

try {
    // ✅ Ensure the `pages` table exists
    $conn->query("SELECT 1 FROM pages LIMIT 1");

    // ✅ Handle Page Update
    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        $page = $_POST['page'];
        $content = $_POST['content'];

        $query = $conn->prepare("UPDATE pages SET content = ? WHERE page_name = ?");
        $query->execute([$content, $page]);

        $successMessage = "Page updated successfully!";
    }

    // ✅ Fetch Pages from DB
    $pages = $conn->query("SELECT * FROM pages")->fetchAll();
} catch (PDOException $e) {
    $errorMessage = "Pages table is missing! <a href='?create_table=true' class='text-blue-600 underline'>Click here to create it</a>.";
}

// ✅ Create Table if Not Exists (When User Clicks)
if (isset($_GET['create_table'])) {
    try {
        $conn->exec("CREATE TABLE pages (
            id INT AUTO_INCREMENT PRIMARY KEY,
            page_name VARCHAR(255) UNIQUE NOT NULL,
            content TEXT NOT NULL
        )");
        header("Location: ?page=pages");
        exit();
    } catch (PDOException $e) {
        $errorMessage = "Failed to create pages table.";
    }
}
?>

<!-- Manage Pages Component -->
<h1 class="text-3xl font-bold text-gray-700 mb-6">Manage Website Pages</h1>

<!-- ✅ Show Error Message if Pages Table is Missing -->
<?php if (!empty($errorMessage)): ?>
    <div class="bg-red-100 text-red-800 p-4 rounded-md mb-6">
        <?= $errorMessage ?>
    </div>
<?php else: ?>
    <!-- Success Message -->
    <?php if (isset($successMessage)): ?>
        <div class="bg-green-100 text-green-800 p-4 rounded-md mb-6">
            <?= $successMessage ?>
        </div>
    <?php endif; ?>

    <!-- Page Selection & Editor -->
    <form method="POST" class="bg-white p-6 rounded-lg shadow-md">
        <label for="page" class="block text-lg font-semibold text-gray-700 mb-2">Select Page to Edit:</label>
        <select name="page" id="page" class="w-full p-2 border border-gray-300 rounded-md mb-4">
            <?php foreach ($pages as $page): ?>
                <option value="<?= $page['page_name'] ?>"><?= ucfirst($page['page_name']) ?></option>
            <?php endforeach; ?>
        </select>

        <label for="content" class="block text-lg font-semibold text-gray-700 mb-2">Page Content:</label>
        <textarea name="content" id="content" rows="6" class="w-full p-2 border border-gray-300 rounded-md"><?= $pages[0]['content'] ?? '' ?></textarea>

        <button type="submit" class="mt-4 p-3 bg-[#d4963a] text-white font-semibold rounded-lg hover:bg-[#b37d2a] transition">
            Save Changes
        </button>
    </form>
<?php endif; ?>
