<?php
include_once __DIR__ . '/../../../includes/db.php';

/**
 * Fetch all hero sections.
 */
function getHeroSections($conn) {
    $stmt = $conn->query("SELECT * FROM hero ORDER BY created_at DESC");
    return $stmt->fetchAll(PDO::FETCH_ASSOC);
}

/**
 * Fetch a single hero section by ID.
 */
function getHeroById($conn, $id) {
    $stmt = $conn->prepare("SELECT * FROM hero WHERE id = ?");
    $stmt->execute([$id]);
    $hero = $stmt->fetch(PDO::FETCH_ASSOC);
    
    if ($hero) {
        return $hero;
    } else {
        return null;
    }
}


function updateHero($conn, $id, $title, $content, $image_url) {
    $stmt = $conn->prepare("UPDATE hero SET title = :title, content = :content, image_url = :image_url WHERE id = :id");
    $stmt->bindParam(":title", $title);
    $stmt->bindParam(":content", $content);
    $stmt->bindParam(":image_url", $image_url);
    $stmt->bindParam(":id", $id, PDO::PARAM_INT);
    
    return $stmt->execute();
}

if ($_SERVER["REQUEST_METHOD"] === "POST" && isset($_POST['action']) && $_POST['action'] === "updateHero") {
    if (!isset($_POST['id'], $_POST['title'], $_POST['content'], $_POST['image_url'])) {
        echo json_encode(["status" => "error", "message" => "Missing required fields."]);
        exit();
    }

    $id = $_POST['id'];
    $title = $_POST['title'];
    $content = $_POST['content'];
    $image_url = $_POST['image_url'];

    try {
        if (updateHero($conn, $id, $title, $content, $image_url)) {
            echo json_encode(["status" => "success", "message" => "Hero section updated successfully."]);
        } else {
            echo json_encode(["status" => "error", "message" => "Failed to update hero section."]);
        }
    } catch (Exception $e) {
        echo json_encode(["status" => "error", "message" => "Database error: " . $e->getMessage()]);
    }
    exit();
}
?>