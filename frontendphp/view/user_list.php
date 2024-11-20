<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>List User</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>

<body class="bg-gray-50 font-sans leading-normal tracking-normal">

    <!-- Navbar -->
    <?php include 'includes/navbar.php'; ?>

    <!-- Main container -->
    <div class="flex">
        <!-- Sidebar -->
        <?php include 'includes/sidebar.php'; ?>

        <!-- Main Content -->
        <div class="flex-1 p-6">
            <div class="max-w-3xl mx-auto">
                <!-- Button to Insert New User -->
                <div class="flex justify-end mb-4">
                    <a href="index.php?modul=user&fitur=input" class="bg-blue-500 hover:bg-blue-600 text-white font-semibold py-2 px-4 rounded">Insert New User</a>
                </div>

                <!-- Users Table -->
                <div class="bg-white shadow rounded">
                    <table class="min-w-full bg-white">
                        <thead class="bg-gray-700 text-white text-sm">
                            <tr>
                                <th class="py-2 px-3">ID</th>
                                <th class="py-2 px-3">User Name</th>
                                <th class="py-2 px-3">Password</th>
                                <th class="py-2 px-3">Role</th>
                                <th class="py-2 px-3">Actions</th>
                            </tr>
                        </thead>
                        <tbody class="text-gray-600 text-sm">
                            <?php foreach ($users as $user) { ?>
                                <tr class="text-center border-t">
                                    <td class="py-2 px-3"><?php echo htmlspecialchars($user->user_id); ?></td>
                                    <td class="py-2 px-3"><?php echo htmlspecialchars($user->user_name); ?></td>
                                    <td class="py-2 px-3"><?php echo htmlspecialchars($user->user_password); ?></td>
                                    <td class="py-2 px-3"><?php echo isset($obj_roles) && method_exists($obj_roles, 'getRoleById') ? htmlspecialchars($obj_roles->getRoleById($user->role_id)->role_name ?? "Role unavailable") : "Role not found"; ?></td>
                                    <td class="py-2 px-3 flex justify-center">
                                        <form action="index.php?modul=user&fitur=edit&user_id=<?= $user->user_id ?>" method="POST" class="mr-2">
                                            <button class="bg-green-500 hover:bg-green-600 text-white font-semibold py-1 px-3 rounded">Update</button>
                                        </form>
                                        <form action="index.php?modul=user&fitur=delete" method="POST">
                                            <input type="hidden" name="user_id" value="<?php echo $user->user_id; ?>">
                                            <button class="bg-red-500 hover:bg-red-600 text-white font-semibold py-1 px-3 rounded">Delete</button>
                                        </form>
                                    </td>
                                </tr>
                            <?php } ?>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
<!-- Bottom Description Section -->
<div class="bg-gray-800 text-white p-8 text-center text-sm">
        <p class="mb-4">
            <strong>About Us:</strong> This website is a comprehensive platform to explore a wide variety of products available in our inventory. 
            Easily browse through different categories to find items that meet your needs, with detailed descriptions, prices, and stock information provided for each product. 
            We aim to make shopping as convenient and informative as possible.
        </p>
        <p class="mt-4 text-gray-400">© 2023 Developed by Danu Dwi Saputra | All rights reserved.</p>
    </div>
</body>

</html>
