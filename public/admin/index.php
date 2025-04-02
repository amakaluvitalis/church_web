<?php
if (session_status() === PHP_SESSION_NONE) {
    session_start();
}

$page = isset($_GET['page']) ? $_GET['page'] : 'login';
$isLoginPage = ($page === 'login');

//Include header ONLY if it's not the login page
if (!$isLoginPage) {
    include_once '../../includes/header.php';
}
?>

<div class="admin-content" id="admin-content">
    <?php 
    include_once 'routes/admin-routes.php'; 
    ?>
</div>

<?php 
if (!$isLoginPage) {
    include_once '../../includes/footer.php';
}
?>
