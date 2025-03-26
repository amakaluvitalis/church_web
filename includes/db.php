<?php
$host = "127.0.0.1";  // Using IP instead of "localhost" to avoid socket issues
$dbname = "church_web";  // Ensure this matches your created database
$username = "church_admin";  // Use the created user
$password = "churchadmin";  // Use the correct password

try {
    $conn = new PDO("mysql:host=$host;dbname=$dbname;charset=utf8mb4", $username, $password);
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    $conn->setAttribute(PDO::ATTR_DEFAULT_FETCH_MODE, PDO::FETCH_ASSOC); // Fetch associative arrays by default
} catch (PDOException $e) {
    die("Database connection failed: " . $e->getMessage());
}
?>
