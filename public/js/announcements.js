// 📌 Floating Button Elements
const floatingButton = document.getElementById("floatingButton");
const toggleButton = document.getElementById("toggleButton");
const closeFloatingButton = document.getElementById("closeFloatingButton");
const notificationPanel = document.getElementById("notificationPanel");
const closePanel = document.getElementById("closePanel");

let shakeInterval;
let visibilityTimeout;

// Function to make the bell shake
function startShaking() {
    toggleButton.classList.add("animate-shake");

    // Stop shaking after 5 seconds, then disappear for 10 seconds before shaking again
    setTimeout(() => {
        toggleButton.classList.remove("animate-shake");
        floatingButton.classList.add("hidden");

        // Reappear after 10 seconds and shake again
        visibilityTimeout = setTimeout(() => {
            floatingButton.classList.remove("hidden");
            startShaking();
        }, 10000);
    }, 5000);
}

// Function to show notification panel
function showPanel() {
    notificationPanel.style.right = "10px"; // Slide in
}

// Function to hide notification panel
function hidePanel() {
    notificationPanel.style.right = "-320px"; // Slide out
}

// Event Listeners
toggleButton.addEventListener("click", showPanel);
closePanel.addEventListener("click", hidePanel);

// Close floating button for 10 minutes
closeFloatingButton.addEventListener("click", function () {
    clearTimeout(visibilityTimeout);
    floatingButton.classList.add("hidden");

    // Reappear after 10 minutes
    setTimeout(() => {
        floatingButton.classList.remove("hidden");
        startShaking();
    }, 10 * 60 * 1000); // 10 minutes
});

// Start the shaking cycle
startShaking();
