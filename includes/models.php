<?php
include_once "db.php";


/**
 * Fetch Vision, Mission, and Slogan content.
 */
function getVisionMissionSlogan() {
    global $conn;
    $stmt = $conn->prepare("SELECT * FROM vision_mission_slogan ORDER BY id ASC");
    $stmt->execute();
    return $stmt->fetchAll(PDO::FETCH_ASSOC);
}

/**
 * Fetch Hero Section Content (Max 3 Items).
 */
function getHeroContent() {
    global $conn;
    $stmt = $conn->prepare("SELECT * FROM hero ORDER BY id ASC LIMIT 3");
    $stmt->execute();
    return $stmt->fetchAll(PDO::FETCH_ASSOC);
}


/**
 * Fetch Gallery preview pictures.
 */
function getGallery() {
    global $conn;
    $stmt = $conn->prepare("SELECT * FROM gallery ORDER BY created_at DESC");
    $stmt->execute();
    return $stmt->fetchAll(PDO::FETCH_ASSOC);
}

/**
 * Fetch Latest Audio Sermons Data.
 */
function getLatestAudioSermons() {
    global $conn;
    $stmt = $conn->query("SELECT title, date, audio_file FROM audio_sermons ORDER BY date DESC");
    return $stmt->fetchAll(PDO::FETCH_ASSOC);
}


/**
 * Fetch Latest Video Sermons Data.
 */
function getLatestSermons() {
    global $conn;
    $stmt = $conn->query("SELECT title, date, speaker, youtube_link FROM latest_sermons ORDER BY date DESC");
    return $stmt->fetchAll(PDO::FETCH_ASSOC);
}


/**
 * Fetch Who We Are section data.
 */
function getWhoWeAre() {
    global $conn;
    $stmt = $conn->query("SELECT title, content, image_url FROM who_we_are LIMIT 1");
    return $stmt->fetch(PDO::FETCH_ASSOC);
}



/**
 * Fetch all historical records.
 */
function getHistory() {
    global $conn;
    return $conn->query("SELECT * FROM history ORDER BY id ASC")->fetchAll();
}


/**
 * Fetch all ministries.
 */
function getMinistries() {
    global $conn;
    return $conn->query("SELECT * FROM ministries ORDER BY id ASC")->fetchAll();
}


/**
 * Fetch all upcoming events.
 */
function getUpcomingEvents() {
    global $conn;
    return $conn->query("SELECT * FROM upcoming_events ORDER BY date ASC")->fetchAll();
}

/**
 * Fetch all activities.
 */
function getActivities() {
    global $conn;
    return $conn->query("SELECT * FROM activities ORDER BY id DESC")->fetchAll();
}

/**
 * Fetch administration leaders.
 */
function getAdministrationLeaders() {
    global $conn;
    return $conn->query("SELECT * FROM administration ORDER BY id ASC")->fetchAll();
}

/**
 * Fetch the vicar welcome message.
 */
function getWelcomeMessage() {
    global $conn;
    return $conn->query("SELECT * FROM welcome_message LIMIT 1")->fetch(PDO::FETCH_ASSOC);
}

/**
 * Handles membership form submission
 * @return void
 */
function handleMembershipSubmission() {
    global $conn;

    if ($_SERVER["REQUEST_METHOD"] === "POST" && isset($_POST["ajax"])) {
        header("Content-Type: application/json"); // Ensure proper JSON response

        $name = trim($_POST["full-name"]);
        $email = trim($_POST["email"]);
        $phone = trim($_POST["country-code"]) . trim($_POST["phone"]);
        $location = trim($_POST["location"]);

        try {
            // Insert into `new_members` table
            $stmt = $conn->prepare("INSERT INTO new_members (name, email, phone, location) VALUES (?, ?, ?, ?)");
            $stmt->execute([$name, $email, $phone, $location]);

            echo json_encode(["status" => "success", "message" => "Your membership application has been received."]);
            exit();
        } catch (PDOException $e) {
            echo json_encode(["status" => "error", "message" => "Something went wrong. Please try again."]);
            exit();
        }
    }
}


/**
 * Handles contact form submission
 * @return string JSON response
 */
function handleContactSubmission() {
    global $conn;

    if ($_SERVER["REQUEST_METHOD"] === "POST") {
        $name = trim($_POST["name"]);
        $email = trim($_POST["email"]);
        $phone = isset($_POST["phone"]) ? trim($_POST["country-code"]) . trim($_POST["phone"]) : null;
        $message = trim($_POST["message"]);

        try {
            // Insert into `contact_messages` table
            $stmt = $conn->prepare("INSERT INTO contact_messages (name, email, phone, message) VALUES (?, ?, ?, ?)");
            $stmt->execute([$name, $email, $phone, $message]);

            echo json_encode(["status" => "success", "message" => "Your message has been sent successfully."]);
            exit();
        } catch (PDOException $e) {
            echo json_encode(["status" => "error", "message" => "Something went wrong. Please try again."]);
            exit();
        }
    }
}

/**
 * Handles ministry application form submission
 * @return string JSON response
 */
function handleMinistryApplication() {
    global $conn;

    if ($_SERVER["REQUEST_METHOD"] === "POST" && isset($_POST["ministry_application"])) {
        $fullName = trim($_POST["fullName"]);
        $email = trim($_POST["emailJoin"]);
        $phone = trim($_POST["phoneJoin"]);
        $ministryName = trim($_POST["ministryName"]);

        try {
            // Insert into `ministry_applications` table
            $stmt = $conn->prepare("INSERT INTO ministry_applications (full_name, email, phone, ministry_name) VALUES (?, ?, ?, ?)");
            $stmt->execute([$fullName, $email, $phone, $ministryName]);

            echo json_encode(["status" => "success", "message" => "Your request has been received successfully."]);
            exit();
        } catch (PDOException $e) {
            echo json_encode(["status" => "error", "message" => "Something went wrong. Please try again."]);
            exit();
        }
    }
}

/**
 * Handles prayer request form submission
 * @return void
 */
function handlePrayerRequest() {
    global $conn;

    if ($_SERVER["REQUEST_METHOD"] === "POST" && isset($_POST["prayer_request"])) {
        $prayerRequest = trim($_POST["prayerRequest"]);
        $email = !empty($_POST["email"]) ? trim($_POST["email"]) : NULL;
        $phone = !empty($_POST["phone"]) ? trim($_POST["phone"]) : NULL;

        if (empty($prayerRequest)) {
            echo json_encode(["status" => "error", "message" => "Prayer request is required."]);
            exit();
        }

        try {
            // Insert into `prayer_requests` table
            $stmt = $conn->prepare("INSERT INTO prayer_requests (request, email, phone, submitted_at) VALUES (?, ?, ?, NOW())");
            $stmt->execute([$prayerRequest, $email, $phone]);

            echo json_encode(["status" => "success", "message" => "Your prayer request has been submitted successfully."]);
            exit();
        } catch (PDOException $e) {
            echo json_encode(["status" => "error", "message" => "Something went wrong. Please try again."]);
            exit();
        }
    }
}

// Call the functions to process the requests
handlePrayerRequest();
handleMinistryApplication();
handleContactSubmission();
handleMembershipSubmission();
?>
