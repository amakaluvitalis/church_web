<?php
include_once "models.php";
$announcements = getAnnouncements();
$hasAnnouncements = !empty($announcements);
?>

<!-- Floating Announcements Button -->
<div id="floatingButton" 
    class="fixed right-4 top-1/2 transform -translate-y-1/2 bg-transparent w-16 h-16 flex items-center justify-center shadow-none transition-all duration-300 <?= $hasAnnouncements ? '' : 'hidden' ?> z-50">
    
    <!-- Bell Icon -->
    <button id="toggleButton" class="focus:outline-none w-full h-full flex items-center justify-center">
        <img src="public/images/bell_icon.png" alt="Notifications" class="w-full h-full object-contain">
    </button>

    <!-- Close (X) Button -->
    <button id="closeFloatingButton" 
        class="absolute -top-2 -right-2 w-6 h-6 rounded-full text-xs font-bold flex items-center justify-center shadow-md hover:bg-[#550000] hover:text-white">
        ✖
    </button>
</div>

<!-- Announcement Panel -->
<div id="notificationPanel" 
    class="fixed right-[-320px] top-1/4 w-80 h-[400px] bg-white shadow-2xl rounded-lg p-4 transition-all duration-300 flex flex-col z-50">
    
    <!-- Close Button -->
    <button id="closePanel" 
        class="absolute left-[-30px] top-1/2 transform -translate-y-1/2 bg-[#660000] hover:bg-[#550000] text-white w-8 h-8 rounded-full flex items-center justify-center shadow-md transition-all duration-300">
        →
    </button>

    <!-- Panel Header -->
    <div class="border-b pb-2 text-center">
        <span class="text-lg font-semibold text-[#660000]">Notifications</span>
    </div>

    <!-- Notification List -->
    <ul class="mt-3 space-y-2 overflow-y-auto max-h-[320px]">
        <?php if ($hasAnnouncements): ?>
            <?php foreach ($announcements as $announcement): ?>
                <li class="bg-gray-100 p-2 rounded-md text-sm border-l-4 border-[#660000]">
                    <strong><?php echo htmlspecialchars($announcement['title']); ?></strong>  
                    <p><?php echo nl2br(htmlspecialchars($announcement['content'])); ?></p>
                    <small class="text-gray-600">👀 Read by <?php echo $announcement['views']; ?> people</small>
                </li>
            <?php endforeach; ?>
        <?php else: ?>
            <li class="text-gray-500 text-sm text-center">No announcements available.</li>
        <?php endif; ?>
    </ul>
</div>
