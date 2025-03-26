<?php
include_once "db.php";

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
?>
