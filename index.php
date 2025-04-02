<?php 
/**
 * Main entry point of the website.
 * 
 * This file serves as the **template wrapper** for all pages. It:
 * - Loads the **header** once.
 * - Dynamically loads the **page content** using `router.php`.
 * - Loads the **footer** once.
 * 
 * The content displayed in the `<div class="content">` section
 * depends on the value of the `page` parameter in the URL.
 * Example: `index.php?page=about` will load `about.php` dynamically.
 * 
 * Ensures a **structured layout** and prevents accidental page repetition.
 */

 $page = isset($_GET['page']) ? $_GET['page'] : 'home';

 // Check if it's an admin page (adjust if needed)
 $isAdminPage = isset($_GET['page']) && strpos($_GET['page'], 'admin') !== false;
 
 // Include header only for non-admin pages
 if (!$isAdminPage) {
     include_once 'includes/header.php';
 }
?>

<!-- Main Content Section -->
<div class="content" id="content">
    <?php 
    /**
     * Dynamically loads the requested page.
     * 
     * - `router.php` will handle which page to include based on the URL.
     * - Ensures only the **necessary** page content is displayed.
     * - Prevents infinite loops or self-inclusion issues.
     */
    include_once 'routes/router.php';

    if (!isset($_GET['page']) || strpos($_GET['page'], 'admin') === false) {
        include_once "public/admin/routes/admin-routes.php"; 
    }
    ?>
</div>

<?php include_once "includes/announcements.php"; ?>
<?php include_once 'includes/footer.php';?>

