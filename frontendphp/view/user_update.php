<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Update User</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>

<body class="bg-gray-100 font-sans leading-normal tracking-normal">

    <!-- Navbar -->
    <?php include 'includes/navbar.php'; ?>

    <!-- Main container -->
    <div class="flex">
        <!-- Sidebar -->
        <?php include 'includes/sidebar.php'; ?>

        <!-- Main Content -->
        <div class="flex-1 p-8">
            <!-- Update User Form -->
            <div class="max-w-lg mx-auto bg-white p-6 rounded-lg shadow-lg">
                <h2 class="text-2xl font-bold mb-6 text-gray-800">Update User</h2>
                <form action="index.php?modul=user&fitur=update" method="POST">
                    <input type="hidden" id="user_id" name="user_id" value="<?php echo htmlspecialchars($obj_users->user_id); ?>">
                    
                    <!-- Nama User -->
                    <div class="mb-4">
                        <label for="user_name" class="block text-gray-700 text-sm font-bold mb-2">Name:</label>
                        <input type="text" id="user_name" name="user_name" class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline" required value="<?php echo isset($obj_users->user_name) ? htmlspecialchars($obj_users->user_name) : ''; ?>">
                    </div>

                    <!-- Password -->
                    <div class="mb-4">
                        <label for="user_password" class="block text-gray-700 text-sm font-bold mb-2">Password:</label>
                        <input type="password" id="user_password" name="user_password" class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline" required value="<?php echo isset($obj_users->user_password) ? htmlspecialchars($obj_users->user_password) : ''; ?>">
                    </div>

                    <!-- Role Selection -->
                    <div class="mb-4">
                        <label for="role_id" class="block text-gray-700 text-sm font-bold mb-2">Role:</label>
                        <select id="role_id" name="role_id" class="w-full shadow border rounded py-2 px-3 text-gray-700 focus:outline-none focus:shadow-outline" required>
                            <option value="">Pilih Role</option>
                            <?php 
                                foreach($roles as $role) { 
                                    $selected = ($role->role_id == $obj_users->role_id) ? 'selected' : '';
                                    if($role->role_status == 1){  
                                        echo "<option value='{$role->role_id}' {$selected}>{$role->role_name}</option>";
                                    }
                                }
                            ?>
                        </select>
                    </div>

                    <!-- Submit Button -->
                    <div class="flex justify-center">
                        <button type="submit" class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded focus:outline-none focus:shadow-outline">Update</button>
                    </div>
                </form>
            </div>
        </div>
    </div>

</body>

</html>
