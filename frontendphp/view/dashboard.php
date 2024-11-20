<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Daftar Barang</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <style>
        .banner-container {
            background-image: url("view/includes/Pict/banners.jpg"); /* Set the correct banner image path */
            background-size: cover; /* Make sure the image covers the entire container */
            background-position: center; /* Position the image in the center */
            height: 200px; /* Set the height for the banner */
            width: 100%; /* Full width */
            position: relative;
            border-radius: 0.5rem;
        }

        /* Optional: Add a semi-transparent overlay on the banner */
        .banner-overlay {
            position: absolute;
            inset: 0;
            background-color: rgba(0, 0, 0, 0.5); /* Slightly dark overlay */
            display: flex;
            align-items: center;
            justify-content: center;
            color: white;
            font-size: 1.5rem;
            font-weight: bold;
        }
    </style>
</head>
<body class="bg-gray-100 font-sans leading-normal tracking-normal min-h-screen flex flex-col">

    <!-- Navbar -->
    <?php include 'includes/navbar.php'; ?>

    <!-- Main container with Sidebar and Content Area -->
    <div class="flex flex-1 min-h-screen">

        <!-- Sidebar -->
        <div class="min-h-screen">
            <?php include 'includes/sidebar.php'; ?>
        </div>

        <!-- Main Content Area -->
        <div class="flex-1 flex flex-col items-center p-8 space-y-8">
            
            <!-- Banner -->
            <div class="w-full banner-container">
                <div class="banner-overlay">
                    <!-- Selamat Datang di Galeri Produk Kami -->
                </div>
            </div>

            <!-- Section Title -->
            <h2 class="text-2xl font-bold mb-4">Daftar Barang</h2>

            <!-- Horizontal Scrollable Product List -->
            <div class="flex overflow-x-auto space-x-4 p-4">
                <?php
                $modelBarang = new modelBarang();
                $barangs = $modelBarang->getAllbarang();

                foreach ($barangs as $barang): ?>
                    <div class="min-w-[160px] bg-white rounded-lg shadow-md overflow-hidden flex-shrink-0 mb-6">
                        <img src="<?php echo $barang->barang_image ?? 'placeholder.jpg'; ?>" alt="Gambar Barang" class="w-full h-32 object-cover">
                        <div class="p-4">
                            <h3 class="text-lg font-semibold"><?php echo $barang->barang_name; ?></h3>
                            <p class="text-gray-600 text-sm mb-2">Deskripsi: <?php echo $barang->barang_description ?? 'Tidak ada deskripsi'; ?></p>
                            <p class="text-blue-600 font-semibold">Rp <?php echo number_format($barang->barang_harga, 0, ',', '.'); ?></p>
                            <p class="text-gray-500 text-sm">Stok: <?php echo $barang->barang_stock; ?></p>
                        </div>
                    </div>
                <?php endforeach; ?>
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
