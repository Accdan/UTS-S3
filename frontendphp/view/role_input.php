<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Input Role</title>
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
            <!-- Formulir Input Role -->
            <div class="max-w-md mx-auto bg-white p-6 rounded-lg shadow-lg border border-gray-200">
                <h2 class="text-2xl font-semibold mb-6 text-gray-800 text-center">Add Role</h2>
                <form action="../index.php?modul=role&fitur=add" method="POST">
                    <!-- Nama Role -->
                    <div class="mb-4">
                        <label for="role_name" class="block text-gray-600 text-sm font-semibold mb-1">Nama Role:</label>
                        <input type="text" id="role_name" name="role_name" class="w-full px-4 py-2 border border-gray-300 rounded focus:ring-2 focus:ring-blue-400 focus:outline-none placeholder-gray-500 transition duration-200" placeholder="Masukkan Nama Role" required>
                    </div>

                    <!-- Role Deskripsi -->
                    <div class="mb-4">
                        <label for="role_description" class="block text-gray-600 text-sm font-semibold mb-1">Role Deskripsi:</label>
                        <textarea id="role_description" name="role_description" class="w-full px-4 py-2 border border-gray-300 rounded focus:ring-2 focus:ring-blue-400 focus:outline-none placeholder-gray-500 transition duration-200" placeholder="Masukkan Deskripsi Role" rows="3" required></textarea>
                    </div>

                    <!-- Role Status -->
                    <div class="mb-4">
                        <label for="role_status" class="block text-gray-600 text-sm font-semibold mb-1">Role Status:</label>
                        <select id="role_status" name="role_status" class="w-full px-4 py-2 border border-gray-300 rounded focus:ring-2 focus:ring-blue-400 focus:outline-none transition duration-200" required>
                            <option value="" disabled selected>Pilih Status</option>
                            <option value="1">Active</option>
                            <option value="0">Inactive</option>
                        </select>
                    </div>

                    <!-- Submit and Cancel Buttons -->
                    <div class="flex justify-between">
                        <button type="submit" class="flex items-center justify-center bg-blue-500 hover:bg-blue-600 text-white font-semibold py-2 px-4 rounded shadow-lg transition duration-200">
                            <span class="material-icons mr-2"></span> Submit
                        </button>
                        <a href="javascript:history.back()" class="flex items-center justify-center bg-gray-400 hover:bg-gray-500 text-white font-semibold py-2 px-4 rounded shadow-lg transition duration-200">
                            <span class="material-icons mr-2"></span> Cancel
                        </a>
                    </div>
                </form>
            </div>
        </div>
    </div>

</body>

</html>
