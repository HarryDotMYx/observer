<?php
session_start();
require_once '../assets/db_config.php';

if (!isset($_SESSION['admin_logged_in'])) {
    header("Location: login.php");
    exit();
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Role Management - SEDCO Staff Directory</title>
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
                    <a href="role_management.php" class="block pl-4 py-1 text-sm text-blue-600">Role Management</a>
                    <a href="audit_logs.php" class="block pl-4 py-1 text-sm text-gray-600 hover:text-blue-600">Audit Logs</a>
                </div>
                <div class="px-4 py-2">
                    <p class="text-sm font-semibold text-gray-600 mb-2">⚙️ Settings</p>
                    <a href="profile_settings.php" class="block pl-4 py-1 text-sm text-gray-600 hover:text-blue-600">Profile Settings</a>
                    <a href="system_preferences.php" class="block pl-4 py-1 text-sm text-gray-600 hover:text-blue-600">System Preferences</a>
                </div>
                <a href="logout.php" class="block px-4 py-2 text-red-600 hover:bg-red-50 mt-4">
                    🚪 Logout
                </a>
            </nav>
        </div>

        <!-- Main Content -->
        <div class="ml-64 p-8 w-full">
            <div class="mb-8">
                <h1 class="text-2xl font-bold text-gray-900">Role Management</h1>
                <p class="text-gray-600">Manage user roles and permissions</p>
            </div>

            <div class="bg-white shadow rounded-lg">
                <div class="px-4 py-5 sm:p-6">
                    <div class="flex justify-between items-center mb-4">
                        <h2 class="text-lg font-medium text-gray-900">Available Roles</h2>
                        <button class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded">
                            Add New Role
                        </button>
                    </div>
                    <table class="min-w-full divide-y divide-gray-200">
                        <thead>
                            <tr>
                                <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Role Name</th>
                                <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Description</th>
                                <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Permissions</th>
                                <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Actions</th>
                            </tr>
                        </thead>
                        <tbody class="bg-white divide-y divide-gray-200">
                            <tr>
                                <td class="px-6 py-4 whitespace-nowrap text-sm font-medium text-gray-900">Administrator</td>
                                <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500">Full system access</td>
                                <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500">All permissions</td>
                                <td class="px-6 py-4 whitespace-nowrap text-sm font-medium">
                                    <a href="#" class="text-indigo-600 hover:text-indigo-900 mr-4">Edit</a>
                                    <a href="#" class="text-red-600 hover:text-red-900">Delete</a>
                                </td>
                            </tr>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</body>
</html>