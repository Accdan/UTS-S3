
<div class="w-64 h-screen bg-gradient-to-b from-gray-800 to-gray-900 text-gray-100 shadow-lg">
    <div class="p-4 font-bold text-xl text-center text-gray-200 border-b border-gray-700">
        Option Action
    </div>
    <ul class="mt-4 space-y-2">
        <?php 
        // Mendapatkan role_id dari session
        $role_id = $_SESSION['role_id'] ?? null; 

        // Sidebar untuk Admin (role_id 1)
        if ($role_id == 1) { 
        ?>
            <li class="group">
                <div class="px-4 py-2 transition duration-200 ease-in-out transform hover:scale-105 hover:bg-gray-700 cursor-pointer rounded-md active:bg-gray-600">
                    <a href="index.php?modul=dashboard" class="block">Main menu</a>
                </div>
            </li>
            <li class="group">
                <div class="px-4 py-2 transition duration-200 ease-in-out transform hover:scale-105 hover:bg-gray-700 cursor-pointer rounded-md active:bg-gray-600">
                    <a href="index.php?modul=role" class="block">Master Data Role</a>
                </div>
            </li>
            <li class="group">
                <div class="px-4 py-2 transition duration-200 ease-in-out transform hover:scale-105 hover:bg-gray-700 cursor-pointer rounded-md active:bg-gray-600">
                    <a href="index.php?modul=user" class="block">Master Data User</a>
                </div>
            </li>
            <li class="group">
                <div class="px-4 py-2 transition duration-200 ease-in-out transform hover:scale-105 hover:bg-gray-700 cursor-pointer rounded-md active:bg-gray-600">
                    <a href="index.php?modul=barang" class="block">Master Data Barang</a>
                </div>
            </li>
                <!-- Dropdown menu -->
                    <li class="px-4 py-2 hover:bg-gray-700 cursor-pointer rounded-md">
                        <a href="index.php?modul=transaksi" class="block">List Transaksi</a>
                    </li>
                </ul>
            </li>
        <?php 
        // Sidebar untuk Kasir (role_id 3)
        } elseif ($role_id == 4) { 
        ?>
            <!-- Transaksi toggle button -->
            <li class="relative">
                <button onclick="toggleDropdown()" class="w-full text-left px-4 py-2 transition duration-200 ease-in-out transform hover:scale-105 hover:bg-gray-700 cursor-pointer rounded-md active:bg-gray-600 flex justify-between items-center">
                    Transaksi
                    <span class="ml-2">&#9662;</span>
                </button>
                <!-- Dropdown menu -->
                <ul id="transaksiDropdown" class="ml-4 space-y-1 bg-gray-800 rounded-md hidden transition-all duration-300 ease-in-out overflow-hidden">
                    <li class="px-4 py-2 hover:bg-gray-700 cursor-pointer rounded-md">
                        <a href="index.php?modul=transaksi&fitur=input" class="block">Input Transaksi</a>
                    </li>
                    <li class="px-4 py-2 hover:bg-gray-700 cursor-pointer rounded-md">
                        <a href="index.php?modul=transaksi" class="block">List Transaksi</a>
                    </li>
                </ul>
            </li>
        <?php 
        // Sidebar untuk Super Admin (role_id 2)
        } elseif ($role_id == 2) { 
        ?>
            <li class="group">
                <div class="px-4 py-2 hover:bg-gray-700 cursor-pointer group-hover:bg-gray-700">
                    <a href="index.php?modul=dashboard">Dashboard</a>
                </div>
            </li>
            <li class="group">
                <div class="px-4 py-2 hover:bg-gray-700 cursor-pointer group-hover:bg-gray-700">
                    <a href="index.php?modul=role">Master Data Role</a>
                </div>
            </li>
            <li class="group">
                <div class="px-4 py-2 hover:bg-gray-700 cursor-pointer group-hover:bg-gray-700">
                    <a href="index.php?modul=user">Master Data User</a>
                </div>
            </li>
            <li class="group">
                <div class="px-4 py-2 hover:bg-gray-700 cursor-pointer group-hover:bg-gray-700">
                    <a href="index.php?modul=barang">Master Data Barang</a>
                </div>
            </li>
            <!-- Transaksi toggle button -->
            <li class="relative">
                <button onclick="toggleDropdown()" class="w-full text-left px-4 py-2 transition duration-200 ease-in-out transform hover:scale-105 hover:bg-gray-700 cursor-pointer rounded-md active:bg-gray-600 flex justify-between items-center">
                    Transaksi
                    <span class="ml-2">&#9662;</span>
                </button>
                <!-- Dropdown menu -->
                <ul id="transaksiDropdown" class="ml-4 space-y-1 bg-gray-800 rounded-md hidden transition-all duration-300 ease-in-out overflow-hidden">
                    <li class="px-4 py-2 hover:bg-gray-700 cursor-pointer rounded-md">
                        <a href="index.php?modul=transaksi&fitur=input" class="block">Input Transaksi</a>
                    </li>
                    <li class="px-4 py-2 hover:bg-gray-700 cursor-pointer rounded-md">
                        <a href="index.php?modul=transaksi" class="block">List Transaksi</a>
                    </li>
                </ul>
            </li>
        <?php } ?>
    </ul>
</div>

<script>
    function toggleDropdown() {
        const dropdown = document.getElementById('transaksiDropdown');
        dropdown.classList.toggle('hidden'); // Toggle visibility
        dropdown.classList.toggle('space-y-1'); // Add spacing when visible
    }
</script>
