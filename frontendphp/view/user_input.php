<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Input User</title>
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
            <!-- Formulir Input User -->
            <div class="max-w-md mx-auto bg-white p-6 rounded-lg shadow-lg border border-gray-200">
                <h2 class="text-2xl font-semibold mb-6 text-gray-800 text-center">Add User</h2>
                <form action="index.php?modul=user&fitur=add" method="POST">
                    <!-- Nama User -->
                    <div class="mb-4">
                        <label for="user_name" class="block text-gray-600 text-sm font-semibold mb-1">Nama User:</label>
                        <input type="text" id="user_name" name="user_name" class="w-full px-4 py-2 border border-gray-300 rounded focus:ring-2 focus:ring-blue-400 focus:outline-none placeholder-gray-500 transition duration-200" placeholder="Masukkan Nama User" required>
                    </div>

                    <!-- Password -->
                    <div class="mb-4">
                        <label for="user_password" class="block text-gray-600 text-sm font-semibold mb-1">Password:</label>
                        <input type="password" id="user_password" name="user_password" class="w-full px-4 py-2 border border-gray-300 rounded focus:ring-2 focus:ring-blue-400 focus:outline-none placeholder-gray-500 transition duration-200" placeholder="Masukkan Password" required>
                    </div>

                    <!-- Role User -->
                    <div class="mb-4">
                        <label for="role_id" class="block text-gray-600 text-sm font-semibold mb-1">Role User:</label>
                        <select id="role_id" name="role_id" class="w-full px-4 py-2 border border-gray-300 rounded focus:ring-2 focus:ring-blue-400 focus:outline-none transition duration-200" required>
                            <option value="" disabled selected>Pilih Role</option>
                            <?php foreach ($roles as $role) {
                                if ($role->role_status == 1) { ?>
                                    <option value="<?= $role->role_id ?>"><?= $role->role_name ?></option>
                            <?php }} ?>
                        </select>
                    </div>

                    <!-- Submit and Cancel Buttons -->
                    <div class="flex justify-between">
                        <button type="submit" class="flex items-center justify-center bg-blue-500 hover:bg-blue-600 text-white font-semibold py-2 px-4 rounded shadow-lg transition duration-200">
                            Submit
                        </button>
                        <a href="javascript:history.back()" class="flex items-center justify-center bg-gray-400 hover:bg-gray-500 text-white font-semibold py-2 px-4 rounded shadow-lg transition duration-200">
                            Cancel
                        </a>
                    </div>
                </form>
            </div>
        </div>
    </div>

</body>

</html>
