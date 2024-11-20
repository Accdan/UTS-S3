<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>List Barang</title>
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
                <!-- Button to Insert New Barang -->
                <div class="flex justify-end mb-4">
                    <a href="view/barang_input.php" class="bg-blue-500 hover:bg-blue-600 text-white font-semibold py-2 px-4 rounded">Insert New Barang</a>
                </div>

                <!-- Barangs Table -->
                <div class="bg-white shadow rounded">
                    <table class="min-w-full bg-white">
                        <thead class="bg-gray-700 text-white text-sm">
                            <tr>
                                <th class="py-2 px-3">ID</th>
                                <th class="py-2 px-3">Barang Name</th>
                                <th class="py-2 px-3">Stock</th>
                                <th class="py-2 px-3">Harga</th>
                                <th class="py-2 px-3">Actions</th>
                            </tr>
                        </thead>
                        <tbody class="text-gray-600 text-sm">
                            <?php foreach ($barangs as $barang) { ?>
                                <tr class="text-center border-t">
                                    <td class="py-2 px-3"><?php echo htmlspecialchars($barang->barang_id); ?></td>
                                    <td class="py-2 px-3"><?php echo htmlspecialchars($barang->barang_name); ?></td>
                                    <td class="py-2 px-3"><?php echo htmlspecialchars($barang->barang_stock); ?></td>
                                    <td class="py-2 px-3"><?php echo htmlspecialchars($barang->barang_harga); ?></td>
                                    <td class="py-2 px-3 flex justify-center">
                                        <form action="index.php?modul=barang&fitur=edit&barang_id=<?= $barang->barang_id ?>" method="POST" class="mr-2">
                                            <button class="bg-green-500 hover:bg-green-600 text-white font-semibold py-1 px-3 rounded">Update</button>
                                        </form>
                                        <form action="index.php?modul=barang&fitur=delete" method="POST">
                                            <input type="hidden" name="barang_id" value="<?php echo $barang->barang_id; ?>">
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
