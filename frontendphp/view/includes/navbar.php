<?php
// Pastikan session sudah dimulai
// session_start(); 

// Pastikan model User dan Role sudah diimport
require_once $_SERVER['DOCUMENT_ROOT'] . '/frontendphp/model_role/user_model.php';
require_once $_SERVER['DOCUMENT_ROOT'] . '/frontendphp/model_role/role_model.php';

// Cek apakah user sudah login
$username = isset($_SESSION['username']) ? $_SESSION['username'] : 'Guest';
$roleName = '';

// Ambil role berdasarkan role_id dari session
if (isset($_SESSION['role_id'])) {
    $roleModel = new modelRole();
    $role = $roleModel->getRoleById($_SESSION['role_id']);
    if ($role) {
        $roleName = $role->role_name;
    }
}
?>

<nav class="bg-[#45a049] p-4 shadow-lg">
    <div class="container mx-auto flex justify-between items-center">
        <div class="text-white font-bold text-xl">
            Gallery Butik Mas Danu
        </div>
        <div class="text-white">
            <span class="mr-4"><?= htmlspecialchars($username); ?></span>
            <span class="mr-4"><?= htmlspecialchars($roleName); ?></span>
            <button class="bg-red-500 hover:bg-red-700 text-white font-bold py-2 px-4 rounded">
                <a href="logoutsession.php" class="text-white">Logout</a>
            </button>
        </div>
    </div>
</nav>
