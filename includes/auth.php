<?php
if (session_status() == PHP_SESSION_NONE) {
    session_start();
}

include __DIR__ . '/../includes/db.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $username = trim($_POST['username']);
    $password = trim($_POST['password']);

    error_log("Login Attempt - Username: $username");

    // Prepare and execute the query
    $stmt = $conn->prepare("SELECT * FROM admins WHERE username = ?");
    $stmt->execute([$username]);
    $admin = $stmt->fetch(PDO::FETCH_ASSOC);

    if ($admin) {
        error_log("User found in DB: " . json_encode($admin));

        // Verify hashed password
        if (password_verify($password, $admin['password'])) {
            error_log("🔑 Password Matched!");

            // Store session data correctly
            $_SESSION['admin_id'] = $admin['id'];
            $_SESSION['admin_name'] = $admin['name'];
            $_SESSION['admin_username'] = $admin['username'];
            $_SESSION['admin'] = true;  // Add this for `requireAuth()` to work

            // Redirect to dashboard
            header("Location: /public/admin/dashboard.php");
            exit();
        } else {
            error_log("Incorrect Password!");
            $_SESSION['error'] = "Invalid credentials!";
        }
    } else {
        error_log("User Not Found!");
        $_SESSION['error'] = "Invalid credentials!";
    }
    header("Location: /public/admin/login.php");
    exit();
}

// Function to check if user is logged in
function isLoggedIn() {
    return isset($_SESSION['admin']);  // Check for the correct session variable
}

// Function to redirect unauthorized users
function requireAuth() {
    if (!isLoggedIn()) {
        header("Location: /public/admin/login.php");
        exit();
    }
}

// Function to generate CSRF Token
function generateCsrfToken() {
    if (empty($_SESSION['csrf_token'])) {
        $_SESSION['csrf_token'] = bin2hex(random_bytes(32));
    }
    return $_SESSION['csrf_token'];
}

// Function to verify CSRF Token
function verifyCsrfToken($token) {
    return isset($_SESSION['csrf_token']) && hash_equals($_SESSION['csrf_token'], $token);
}
?>
