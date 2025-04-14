<?php
session_start();
require_once '../includes/auth.php';
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Home - <?= SITE_NAME ?></title>
    <script src="https://cdn.tailwindcss.com"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
</head>
<body class="bg-gray-100">
    <nav class="bg-white shadow">
        <div class="max-w-6xl mx-auto px-4">
            <div class="flex justify-between items-center py-4">
                <a href="?page=home" class="text-xl font-bold"><?= SITE_NAME ?></a>
                <div class="flex space-x-4">
                    <?php if (isLoggedIn()): ?>
                        <?php if (isAdmin()): ?>
                            <a href="?page=admin" class="px-3 py-2">Admin Dashboard</a>
                        <?php endif; ?>
                        <a href="?page=profile" class="px-3 py-2">My Account</a>
                        <a href="?page=logout" class="px-3 py-2">Logout</a>
                    <?php else: ?>
                        <a href="?page=login" class="px-3 py-2">Login</a>
                        <a href="?page=register" class="px-3 py-2">Register</a>
                    <?php endif; ?>
                    <a href="?page=cart" class="px-3 py-2">
                        <i class="fas fa-shopping-cart"></i>
                    </a>
                </div>
            </div>
        </div>
    </nav>

    <main class="max-w-6xl mx-auto py-8 px-4">
        <h1 class="text-3xl font-bold mb-8">Welcome to <?= SITE_NAME ?></h1>
        
        <div class="grid grid-cols-1 md:grid-cols-3 gap-6">
            <!-- Product cards will go here -->
            <div class="bg-white rounded-lg shadow p-6">
                <h2 class="text-xl font-semibold mb-2">Sample Product</h2>
                <p class="text-gray-600 mb-4">$19.99</p>
                <button class="bg-blue-500 text-white px-4 py-2 rounded hover:bg-blue-600">
                    Add to Cart
                </button>
            </div>
        </div>
    </main>
</body>
</html>
