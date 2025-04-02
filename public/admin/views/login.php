<?php
if (session_status() == PHP_SESSION_NONE) {
    session_start();
}
include_once __DIR__ . '/../../../includes/db.php';
include_once __DIR__ . '/../../../includes/auth.php';

$errorMessage = isset($_SESSION['error']) ? $_SESSION['error'] : "";
unset($_SESSION['error']);
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Login</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <link rel="stylesheet" href="./css/index.css">
</head>
<body class="h-screen flex justify-center items-center bg-gradient-to-r from-[#3d0000] to-[#d4963a] overflow-hidden">

    <div class="w-11/12 md:w-3/4 h-4/5 flex flex-col md:flex-row items-center">
        <!-- 📝 Left: Login Form -->
        <div class="flex-1 flex justify-center items-center">
            <div class="bg-white/10 backdrop-blur-md p-8 rounded-xl shadow-lg w-96">
                <h2 class="text-2xl font-bold text-white text-center mb-6">Admin Login</h2>
                <form action="../../includes/auth.php" method="POST" class="space-y-4">
                    <input type="hidden" name="csrf_token" value="<?= generateCsrfToken(); ?>">

                    <!-- Username Input -->
                    <div>
                        <label for="username" class="text-white font-semibold">Username</label>
                        <input type="text" id="username" name="username" 
                            class="w-full px-4 py-2 border border-white rounded-lg bg-white/30 text-white placeholder-white focus:outline-none focus:ring-2 focus:ring-[#d4963a]" 
                            placeholder="Enter username" required>
                    </div>

                    <!-- Password Input with Toggle -->
                    <div class="relative">
                        <label for="password" class="text-white font-semibold">Password</label>
                        <div class="relative">
                            <input type="password" id="password" name="password" 
                                class="w-full px-4 py-2 border border-white rounded-lg bg-white/30 text-white placeholder-white focus:outline-none focus:ring-2 focus:ring-[#d4963a] pr-10" 
                                placeholder="Enter password" required>
                            <button type="button" onclick="togglePassword()" class="absolute inset-y-0 right-3 flex items-center text-white">
                                <svg id="eyeIcon" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor" class="h-5 w-5">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 12a3 3 0 11-6 0 3 3 0 016 0z"/>
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M2.458 12C3.732 7.943 7.523 5 12 5c4.477 0 8.268 2.943 9.542 7-1.274 4.057-5.065 7-9.542 7-4.477 0-8.268-2.943-9.542-7z"/>
                                </svg>
                            </button>
                        </div>
                    </div>

                    <!-- Submit Button -->
                    <button type="submit" 
                            class="w-full py-2 bg-[#d4963a] text-white font-semibold rounded-lg hover:bg-[#b37d2a] transition">
                        Login
                    </button>
                </form>
                <p class="text-center text-white text-sm mt-4">
                    &copy; <?= date("Y"); ?> ACK All Saints Maseno Parish. All Rights Reserved.
                </p>
            </div>
        </div>

        <!-- 🎇 Right: Spiral Animation -->
        <div class="hidden md:flex flex-1 justify-center items-center">
            <div class="spiral-container">
                <div class="item" style="--i:0;"></div>
                <div class="item" style="--i:1;"></div>
                <div class="item" style="--i:2;"></div>
                <div class="item" style="--i:3;"></div>
                <div class="item" style="--i:4;"></div>
                <div class="item" style="--i:5;"></div>
                <div class="item" style="--i:6;"></div>
                <div class="item" style="--i:7;"></div>
                <div class="item" style="--i:8;"></div>
                <div class="item" style="--i:9;"></div>
                <div class="item" style="--i:10;"></div>
                <div class="item" style="--i:11;"></div>
                <div class="item" style="--i:12;"></div>
                <div class="item" style="--i:13;"></div>
                <div class="item" style="--i:14;"></div>
                <div class="item" style="--i:15;"></div>
                <div class="item" style="--i:16;"></div>
                <div class="item" style="--i:17;"></div>
                <div class="item" style="--i:18;"></div>
                <div class="item" style="--i:19;"></div>
                <div class="item" style="--i:20;"></div>
            </div>
        </div>

        <!-- 📱 Mobile: Spiral below Login Form -->
        <div class="md:hidden flex justify-center items-center mt-8">
            <div class="spiral-container">
                <div class="item" style="--i:0;"></div>
                <div class="item" style="--i:1;"></div>
                <div class="item" style="--i:2;"></div>
                <div class="item" style="--i:3;"></div>
                <div class="item" style="--i:4;"></div>
                <div class="item" style="--i:5;"></div>
                <div class="item" style="--i:6;"></div>
                <div class="item" style="--i:7;"></div>
                <div class="item" style="--i:8;"></div>
                <div class="item" style="--i:9;"></div>
                <div class="item" style="--i:10;"></div>
                <div class="item" style="--i:11;"></div>
                <div class="item" style="--i:12;"></div>
                <div class="item" style="--i:13;"></div>
                <div class="item" style="--i:14;"></div>
                <div class="item" style="--i:15;"></div>
                <div class="item" style="--i:16;"></div>
                <div class="item" style="--i:17;"></div>
                <div class="item" style="--i:18;"></div>
                <div class="item" style="--i:19;"></div>
                <div class="item" style="--i:20;"></div>
            </div>
        </div>
    </div>
    <script>
function togglePassword() {
    const passwordInput = document.getElementById("password");
    const eyeIcon = document.getElementById("eyeIcon");

    if (passwordInput.type === "password") {
        passwordInput.type = "text";
        eyeIcon.innerHTML = `
            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" 
                d="M13.875 18.825A10.05 10.05 0 0112 19c-4.477 0-8.268-2.943-9.542-7 1.274-4.057 5.065-7 9.542-7 1.34 0 2.623.244 3.825.688m3.853 2.32a9.978 9.978 0 012.017 3.992c-1.274 4.057-5.065 7-9.542 7-1.34 0-2.623-.244-3.825-.688m-.658-1.163A9.978 9.978 0 012.458 12M6 18L18 6"/>
        `;
    } else {
        passwordInput.type = "password";
        eyeIcon.innerHTML = `
            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 12a3 3 0 11-6 0 3 3 0 016 0z"/>
            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M2.458 12C3.732 7.943 7.523 5 12 5c4.477 0 8.268 2.943 9.542 7-1.274 4.057-5.065 7-9.542 7-4.477 0-8.268-2.943-9.542-7z"/>
        `;
    }
}
</script>
</body>
</html>
