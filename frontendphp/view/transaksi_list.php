<!-- <?php 
$username = isset($_SESSION['username']) ? $_SESSION['username'] : 'Guest';
var_dump($username);
?> -->

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Daftar Transaksi</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <script>
        function openModal(id) {
            document.getElementById(id).classList.remove('hidden');
        }

        function closeModal(id) {
            document.getElementById(id).classList.add('hidden');
        }
    </script>
</head>

<body class="bg-gray-50 font-sans leading-normal tracking-normal">

    <!-- Navbar -->
    <?php include 'includes/navbar.php'; ?>

    <div class="flex">
        <!-- Sidebar -->
        <?php include 'includes/sidebar.php'; ?>

        <div class="flex-1 p-8">
            <div class="container mx-auto">
                <h2 class="text-2xl font-semibold text-gray-900 mb-6">Daftar Transaksi</h2>
                
                <!-- Tabel Daftar Transaksi -->
                <div class="overflow-x-auto bg-white shadow-md rounded-lg">
                    <table class="min-w-full table-auto">
                        <thead class="bg-gray-200 text-gray-700">
                            <tr>
                                <th class="py-2 px-4 text-left text-sm font-medium">ID Transaksi</th>
                                <th class="py-2 px-4 text-left text-sm font-medium">Kasir</th> 
                                <th class="py-2 px-4 text-left text-sm font-medium">Customer</th> 
                                <th class="py-2 px-4 text-left text-sm font-medium">Total</th>
                                <th class="py-2 px-4 text-left text-sm font-medium">Aksi</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php if (!empty($transaksis)) { ?>
                                <?php foreach ($transaksis as $transaksi) {
                                    $total = is_numeric($transaksi->transaksi_total) ? $transaksi->transaksi_total : 0; ?>
                                    <tr class="border-b">
                                        <td class="py-2 px-4 text-sm"><?php echo htmlspecialchars($transaksi->transaksi_id); ?></td>
                                        <td class="py-2 px-4 text-sm"><?= htmlspecialchars($transaksi->kasir); ?></td>   
                                        <!-- <td class="py-2 px-4 text-sm"><?= htmlspecialchars($username); ?></td> -->
                                        <td class="py-2 px-4 text-sm"><?php echo htmlspecialchars($transaksi->user->user_name);
                                        //  var_dump($kasir);
                                        //  var_dump($customer);  ?></td> 
                                        <td class="py-2 px-4 text-sm"><?php echo 'Rp' . number_format($total, 0, ',', '.'); ?></td>
                                        <td class="py-2 px-4 text-sm">
                                            <button class="bg-indigo-600 hover:bg-indigo-700 text-white py-1 px-3 rounded-md text-xs"
                                                onclick="openModal('modal-<?php echo $transaksi->transaksi_id; ?>')">Lihat Detail</button>
                                        </td>
                                    </tr>
                                <?php } ?>
                            <?php } else { ?>
                                <tr>
                                    <td colspan="5" class="py-2 px-4 text-center text-gray-500">Tidak ada transaksi ditemukan.</td>
                                </tr>
                            <?php } ?>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>

    <!-- Modal untuk detail transaksi -->
    <?php if (!empty($transaksis)) {
        foreach ($transaksis as $transaksi) { ?>
            <div id="modal-<?php echo $transaksi->transaksi_id; ?>" class="fixed inset-0 bg-black bg-opacity-50 flex items-center justify-center hidden">
                <div class="bg-white rounded-lg shadow-xl w-11/12 max-w-lg p-6 animate__animated animate__fadeIn">
                    <h3 class="text-xl font-semibold text-gray-900 mb-4">Detail Transaksi: <?php echo htmlspecialchars($transaksi->transaksi_id); ?></h3>
                    <table class="min-w-full bg-white border border-gray-200 rounded-lg mb-6">
                        <thead class="bg-gray-200 text-gray-600">
                            <tr>
                                <th class="py-2 px-4 text-sm font-medium">Barang</th>
                                <th class="py-2 px-4 text-sm font-medium">Jumlah</th>
                                <th class="py-2 px-4 text-sm font-medium">Sub total</th>
                            </tr>
                        </thead>
                        <tbody class="divide-y divide-gray-300 text-gray-700">
                            <?php 
                            // Hanya menampilkan data yang unik dengan ID barang sebagai kunci
                            $unique_items = [];
                            foreach ($transaksi->detail_transaksi as $detail) {
                                if (!in_array($detail->barang->barang_id, $unique_items)) {
                                    $unique_items[] = $detail->barang->barang_id; ?>
                                    <tr class="text-center">
                                        <td class="py-2 px-4"><?php echo htmlspecialchars($detail->barang->barang_name); ?></td>
                                        <td class="py-2 px-4"><?php echo htmlspecialchars($detail->detail_jumlah); ?></td>
                                        <td class="py-2 px-4"><?php echo 'Rp' . number_format($detail->detail_subtotal, 0, ',', '.'); ?></td>
                                    </tr>
                                <?php }
                            } ?>
                        </tbody>
                    </table>
                    <div class="mt-4 text-right">
                        <button class="bg-red-500 hover:bg-red-600 text-white py-2 px-4 rounded-md text-sm"
                            onclick="closeModal('modal-<?php echo $transaksi->transaksi_id; ?>')">
                            Close
                        </button>
                    </div>
                </div>
            </div>
        <?php }
    } ?>

</body>

</html>
