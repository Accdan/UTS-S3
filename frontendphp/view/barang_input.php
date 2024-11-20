<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Input Barang</title>
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
            <!-- Formulir Input Barang -->
            <div class="max-w-md mx-auto bg-white p-6 rounded-lg shadow-lg border border-gray-200">
                <h2 class="text-2xl font-semibold mb-6 text-gray-800 text-center">Add Barang</h2>
                <form action="../index.php?modul=barang&fitur=add" method="POST">
                    <!-- Nama Barang -->
                    <div class="mb-4">
                        <label for="barang_name" class="block text-gray-600 text-sm font-semibold mb-1">Nama Barang:</label>
                        <input type="text" id="barang_name" name="barang_name" class="w-full px-4 py-2 border border-gray-300 rounded focus:ring-2 focus:ring-blue-400 focus:outline-none placeholder-gray-500 transition duration-200" placeholder="Masukkan Nama Barang" required>
                    </div>

                    <!-- Stok Barang -->
                    <div class="mb-4">
                        <label for="barang_stock" class="block text-gray-600 text-sm font-semibold mb-1">Stok Barang:</label>
                        <input type="number" id="barang_stock" name="barang_stock" class="w-full px-4 py-2 border border-gray-300 rounded focus:ring-2 focus:ring-blue-400 focus:outline-none placeholder-gray-500 transition duration-200" placeholder="Masukkan Stok Barang" required>
                    </div>

                    <!-- Harga Barang -->
                    <div class="mb-4">
                        <label for="barang_harga" class="block text-gray-600 text-sm font-semibold mb-1">Harga Barang:</label>
                        <input type="number" id="barang_harga" name="barang_harga" class="w-full px-4 py-2 border border-gray-300 rounded focus:ring-2 focus:ring-blue-400 focus:outline-none placeholder-gray-500 transition duration-200" placeholder="Masukkan Harga Barang" required>
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
