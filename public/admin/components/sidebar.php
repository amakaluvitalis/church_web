<aside class="w-64 bg-[#660000] text-white h-screen flex flex-col py-6 px-4 shadow-lg">
    <!-- Church Logo & Name -->
    <div class="flex items-center space-x-3 mb-6">
    <a href="#" id="dashboard-logo" class="flex items-center">
        <img src="/public/images/ack_logo.png" alt="Church Logo" class="h-16 w-auto object-contain">
    </a>
        <span class="text-xl font-semibold">All Saints ACK Maseno Parish</span>
    </div>

    <!-- Sidebar Navigation -->
    <nav class="flex-grow">
        <ul class="space-y-2">
            <li>
                <a href="#" data-page="dashboard" class="menu-item flex items-center space-x-3 p-3 rounded-lg transition-all duration-200 ease-in-out hover:bg-[#b37d2a]">
                <img src="/public/images/dashboard.svg" alt="Logout" class="w-6 h-6">
                    <span>Dashboard</span>
                </a>
            </li>
            <li>
                <a href="#" data-page="pages" class="menu-item flex items-center space-x-3 p-3 rounded-lg transition-all duration-200 ease-in-out hover:bg-[#b37d2a]">
                <img src="/public/images/manage.svg" alt="Logout" class="w-6 h-6">
                    <span>Manage Pages</span>
                </a>
            </li>
            <li>
                <a href="#" data-page="analytics" class="menu-item flex items-center space-x-3 p-3 rounded-lg transition-all duration-200 ease-in-out hover:bg-[#b37d2a]">
                <img src="/public/images/analyse.svg" alt="Logout" class="w-6 h-6">
                    <span>View Analytics</span>
                </a>
            </li>
        </ul>
    </nav>

    <a href="?page=logout" class="flex items-center justify-center space-x-3 p-3 rounded-lg bg-red-500 hover:bg-red-600 transition-all duration-200 ease-in-out">
        <img src="/public/images/bx-log-out.svg" alt="Logout" class="w-6 h-6">
        <span>Logout</span>
    </a>
</aside>
