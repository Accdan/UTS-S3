

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Transaksi Baru</title>
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
        <div class="flex-1 p-8 space-y-6">
            <h2 class="text-2xl font-bold mb-4">Transaksi Baru</h2>

            <!-- Form Transaksi -->
            <form action="index.php?modul=transaksi&fitur=add" method="POST" id="transaksiForm">
                
                <!-- Customer Selection -->
                <div class="mb-4">
                    <label for="customer" class="block text-gray-700">Customer</label>
                    <select id="customer" name="customer" class="mt-1 p-2 border border-gray-300 rounded w-full max-w-xs" required>
                        <option value="" disabled selected>Pilih Customer</option>
                        <?php
                        if (!empty($customers)) {
                            foreach ($customers as $customer) {
                                if ($customer->role_id == 3)
                                    echo "<option value='{$customer->user_id}'>{$customer->user_name}</option>";
                            }
                        }
                        ?>
                    </select>
                </div>

                <!-- Barang Details Table -->
                <h3 class="text-xl font-semibold mb-2">Detail Barang</h3>
                <table class="table-auto w-full border-collapse mb-4">
                    <thead>
                        <tr class="bg-gray-100">
                            <th class="p-2 border border-gray-300">Barang</th>
                            <th class="p-2 border border-gray-300">Jumlah</th>
                            <th class="p-2 border border-gray-300">Aksi</th>
                        </tr>
                    </thead>
                    <tbody id="barangContainer">
                        <!-- Barang Item Template -->
                        <tr class="barang-item">
                            <td class="p-2 border border-gray-300">
                                <select name="barang[]" class="p-2 border border-gray-300 rounded w-full" required>
                                    <option value="" disabled selected>Pilih Barang</option>
                                    <?php
                                    if (!empty($barangs)) {
                                        foreach ($barangs as $barang) {
                                            echo "<option value='{$barang->barang_id}'>{$barang->barang_name} - Rp" . number_format($barang->barang_harga, 0, ',', '.') . "</option>";
                                        }
                                    }
                                    ?>
                                </select>
                            </td>
                            <td class="p-2 border border-gray-300">
                                <input type="number" name="jumlah[]" class="p-2 border border-gray-300 rounded w-full" min="1" required>
                            </td>
                            <td class="p-2 border border-gray-300">
                                <button type="button" class="bg-red-500 text-white p-2 rounded remove-item w-full">Hapus</button>
                            </td>
                        </tr>
                    </tbody>
                </table>

                <!-- Add Barang Button -->
                <button type="button" id="addBarangBtn" class="bg-blue-500 text-white p-2 rounded mt-4 w-full">Tambah Barang</button>

                <!-- Submit Button -->
                <div class="mt-6">
                    <button type="submit" class="bg-green-500 text-white p-2 rounded w-full">Simpan Transaksi</button>
                </div>

            </form>
        </div>
    </div>

    <!-- Script -->
    <script>
        // Add new barang input row
        document.getElementById('addBarangBtn').addEventListener('click', function() {
            const barangContainer = document.getElementById('barangContainer');
            const newBarang = document.querySelector('.barang-item').cloneNode(true);
            newBarang.querySelector('select[name="barang[]"]').value = '';
            newBarang.querySelector('input[name="jumlah[]"]').value = '';
            barangContainer.appendChild(newBarang);
        });

        // Remove barang input row
        document.addEventListener('click', function(event) {
            if (event.target.classList.contains('remove-item')) {
                if (document.querySelectorAll('.barang-item').length > 1) {
                    event.target.closest('.barang-item').remove();
                } else {
                    alert('Minimal satu barang harus ada dalam transaksi.');
                }
            }
        });
    </script>

</body>

</html>
