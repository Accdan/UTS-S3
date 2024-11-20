<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Update Role</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>

<body class="bg-gradient-to-br from-gray-100 to-gray-300 font-sans leading-normal tracking-normal">

    <!-- Navbar -->
    <?php include 'includes/navbar.php'; ?>

    <!-- Main container -->
    <div class="flex">
        <!-- Sidebar -->
        <?php include 'includes/sidebar.php'; ?>

        <!-- Main Content -->
        <div class="flex-1 p-6">
            <div class="max-w-md mx-auto bg-white p-6 rounded-lg shadow-lg border border-gray-200">
                <h2 class="text-2xl font-semibold mb-6 text-gray-800 text-center">Update Role</h2>
                <form action="index.php?modul=role&fitur=update" method="POST">
                    <input type="hidden" id="role_id" name="role_id" value="<?php echo htmlspecialchars($obj_roles->role_id); ?>">

                    <!-- Nama Role -->
                    <div class="mb-4">
                        <label for="role_name" class="block text-gray-600 text-sm font-semibold mb-1">Nama Role:</label>
                        <input type="text" id="role_name" name="role_name" class="w-full px-4 py-2 border border-gray-300 rounded focus:ring-2 focus:ring-blue-400 focus:outline-none placeholder-gray-500 transition duration-200" required value="<?php echo isset($obj_roles->role_name) ? htmlspecialchars($obj_roles->role_name) : ''; ?>">
                    </div>

                    <!-- Role Deskripsi -->
                    <div class="mb-4">
                        <label for="role_description" class="block text-gray-600 text-sm font-semibold mb-1">Role Deskripsi:</label>
                        <textarea id="role_description" name="role_description" class="w-full px-4 py-2 border border-gray-300 rounded focus:ring-2 focus:ring-blue-400 focus:outline-none placeholder-gray-500 transition duration-200" rows="3" required><?php echo isset($obj_roles->role_description) ? htmlspecialchars($obj_roles->role_description) : ''; ?></textarea>
                    </div>

                    <!-- Role Status -->
                    <div class="mb-4">
                        <label for="role_status" class="block text-gray-600 text-sm font-semibold mb-1">Role Status:</label>
                        <select id="role_status" name="role_status" class="w-full px-4 py-2 border border-gray-300 rounded focus:ring-2 focus:ring-blue-400 focus:outline-none transition duration-200" required>
                            <option value="1" <?php echo isset($obj_roles->role_status) && $obj_roles->role_status == 1 ? 'selected' : ''; ?>>Aktif</option>
                            <option value="0" <?php echo isset($obj_roles->role_status) && $obj_roles->role_status == 0 ? 'selected' : ''; ?>>Tidak Aktif</option>
                        </select>
                    </div>

                    <!-- Submit Button -->
                    <div class="flex justify-center">
                        <button type="submit" class="flex items-center justify-center bg-blue-500 hover:bg-blue-600 text-white font-semibold py-2 px-4 rounded shadow-lg transition duration-200">
                            <span class="material-icons mr-2"></span> Update
                        </button>
                    </div>
                </form>
            </div>
        </div>
    </div>

</body>

</html>
