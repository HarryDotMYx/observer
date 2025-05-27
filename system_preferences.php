<?php
session_start();
require_once '../assets/db_config.php';

if (!isset($_SESSION['admin_logged_in'])) {
    header("Location: login.php");
    exit();
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Handle system preferences update logic here
    $success_message = "System preferences updated successfully!";
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>System Preferences - SEDCO Staff Directory</title>
    <link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.19/dist/tailwind.min.css" rel="stylesheet">
</head>
<body class="min-h-screen bg-gray-100">
    <div class="flex">
        <!-- Sidebar -->
        <div class="w-64 bg-white shadow-lg h-screen fixed">
            <div class="p-4 border-b">
                <img src="../img/logosedco.svg" alt="SEDCO Logo" class="h-12 mx-auto">
                <div class="mt-4 text-center">
                    <p class="text-gray-600">Welcome, Admin</p>
                </div>
            </div>
            <nav class="mt-4">
                <a href="dashboard.php" class="block px-4 py-2 text-gray-600 hover:bg-gray-200">
                    📊 Dashboard
                </a>
                <div class="px-4 py-2">
                    <p class="text-sm font-semibold text-gray-600 mb-2">👥 Users</p>
                    <a href="dashboard.php" class="block pl-4 py-1 text-sm text-gray-600 hover:text-blue-600">View All Users</a>
                    <a href="add_user.php" class="block pl-4 py-1 text-sm text-gray-600 hover:text-blue-600">Add New User</a>
                </div>
                <div class="px-4 py-2">
                    <p class="text-sm font-semibold text-gray-600 mb-2">🔐 Access Control</p>
                    <a href="role_management.php" class="block pl-4 py-1 text-sm text-gray-600 hover:text-blue-600">Role Management</a>
                    <a href="audit_logs.php" class="block pl-4 py-1 text-sm text-gray-600 hover:text-blue-600">Audit Logs</a>
                </div>
                <div class="px-4 py-2">
                    <p class="text-sm font-semibold text-gray-600 mb-2">⚙️ Settings</p>
                    <a href="profile_settings.php" class="block pl-4 py-1 text-sm text-gray-600 hover:text-blue-600">Profile Settings</a>
                    <a href="system_preferences.php" class="block pl-4 py-1 text-sm text-blue-600">System Preferences</a>
                </div>
                <a href="logout.php" class="block px-4 py-2 text-red-600 hover:bg-red-50 mt-4">
                    🚪 Logout
                </a>
            </nav>
        </div>

        <!-- Main Content -->
        <div class="ml-64 p-8 w-full">
            <div class="mb-8">
                <h1 class="text-2xl font-bold text-gray-900">System Preferences</h1>
                <p class="text-gray-600">Configure system-wide settings and preferences</p>
            </div>

            <?php if (isset($success_message)): ?>
                <div class="bg-green-100 border border-green-400 text-green-700 px-4 py-3 rounded mb-4">
                    <?php echo $success_message; ?>
                </div>
            <?php endif; ?>

            <div class="bg-white shadow rounded-lg">
                <div class="px-4 py-5 sm:p-6">
                    <form method="POST" action="">
                        <div class="grid grid-cols-1 gap-6">
                            <div>
                                <label class="block text-sm font-medium text-gray-700">Site Title</label>
                                <input type="text" name="site_title" value="SEDCO Staff Directory" class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-indigo-500 focus:ring-indigo-500">
                            </div>
                            
                            <div>
                                <label class="block text-sm font-medium text-gray-700">Default Language</label>
                                <select name="language" class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-indigo-500 focus:ring-indigo-500">
                                    <option value="en">English</option>
                                    <option value="ms">Bahasa Malaysia</option>
                                </select>
                            </div>
                            
                            <div>
                                <label class="block text-sm font-medium text-gray-700">Time Zone</label>
                                <select name="timezone" class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-indigo-500 focus:ring-indigo-500">
                                    <option value="Asia/Kuala_Lumpur">Asia/Kuala Lumpur</option>
                                    <option value="UTC">UTC</option>
                                </select>
                            </div>
                            
                            <div>
                                <label class="block text-sm font-medium text-gray-700">Email Settings</label>
                                <div class="mt-2">
                                    <label class="inline-flex items-center">
                                        <input type="checkbox" name="email_notifications" class="rounded border-gray-300 text-indigo-600 shadow-sm focus:border-indigo-500 focus:ring-indigo-500">
                                        <span class="ml-2">Enable email notifications</span>
                                    </label>
                                </div>
                            </div>
                        </div>
                        
                        <div class="mt-6">
                            <button type="submit" class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded">
                                Save Preferences
                            </button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</body>
</html>