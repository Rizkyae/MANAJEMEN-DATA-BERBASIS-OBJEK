<?php
include_once "controllers/BukuController.php";
$controller = new BukuController();
$data = $controller->model->getAll();
?>
<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <title>Sistem Informasi Perpustakaan Pemerintahan</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <style>
        body {
            background-image: url('https://images.unsplash.com/photo-1541963463532-d68292c34b19?q=80&w=2000&auto=format&fit=crop');
            background-size: cover;
            background-attachment: fixed;
            background-position: center;
        }
    </style>
</head>
<body class="font-sans antialiased text-gray-800">
    <div class="min-h-screen bg-black bg-opacity-50 py-10 px-5">
        <div class="max-w-6xl mx-auto bg-white bg-opacity-95 shadow-2xl rounded-xl overflow-hidden backdrop-blur-sm">
            
            <!-- Header Pemerintahan -->
            <div class="bg-blue-900 text-white py-6 px-8 flex items-center justify-between border-b-4 border-yellow-500">
                <div>
                    <h1 class="text-3xl font-bold tracking-wider">PORTAL PERPUSTAKAAN</h1>
                    <p class="text-sm font-light mt-1 opacity-80">Kementerian Data & Arsip Republik Indonesia</p>
                </div>
            </div>

            <div class="p-8">
                <div class="flex justify-between items-center mb-6">
                    <h2 class="text-2xl font-semibold text-gray-800 border-l-4 border-blue-900 pl-3">Daftar Koleksi Buku</h2>
                    <a href="views/tambah.php" class="bg-blue-600 hover:bg-blue-700 text-white font-medium py-2 px-5 rounded shadow transition duration-200 flex items-center gap-2">
                        + Tambah Data
                    </a>
                </div>

                <div class="overflow-x-auto">
                    <table class="w-full text-left border-collapse">
                        <thead>
                            <tr class="bg-gray-100 border-b-2 border-gray-300">
                                <th class="py-3 px-4 font-semibold text-gray-600">No</th>
                                <th class="py-3 px-4 font-semibold text-gray-600">Judul Buku</th>
                                <th class="py-3 px-4 font-semibold text-gray-600">Pengarang</th>
                                <th class="py-3 px-4 font-semibold text-gray-600">Penerbit</th>
                                <th class="py-3 px-4 font-semibold text-gray-600">Tahun</th>
                                <th class="py-3 px-4 font-semibold text-gray-600">Kategori</th>
                                <th class="py-3 px-4 font-semibold text-gray-600 text-center">Aksi</th>
                            </tr>
                        </thead>
                        <tbody class="divide-y divide-gray-200">
                            <?php
                            $no = 1;
                            if($data->num_rows > 0) {
                                while($row = $data->fetch_assoc()) {
                            ?>
                            <tr class="hover:bg-gray-50 transition duration-150">
                                <td class="py-3 px-4"><?= $no++; ?></td>
                                <td class="py-3 px-4 font-medium text-blue-900"><?= $row['judul']; ?></td>
                                <td class="py-3 px-4"><?= $row['pengarang']; ?></td>
                                <td class="py-3 px-4"><?= $row['penerbit']; ?></td>
                                <td class="py-3 px-4"><?= $row['tahun_terbit']; ?></td>
                                <td class="py-3 px-4"><span class="bg-gray-200 text-gray-700 text-xs py-1 px-2 rounded-full"><?= $row['nama_kategori'] ? $row['nama_kategori'] : 'Tanpa Kategori'; ?></span></td>
                                <td class="py-3 px-4 flex justify-center gap-2">
                                    <a href="views/edit.php?id=<?= $row['id']; ?>" class="bg-amber-500 hover:bg-amber-600 text-white text-sm py-1 px-3 rounded transition duration-200">Edit</a>
                                    <a href="index.php?hapus=<?= $row['id']; ?>" onclick="return confirm('Yakin ingin menghapus buku ini?')" class="bg-red-600 hover:bg-red-700 text-white text-sm py-1 px-3 rounded transition duration-200">Hapus</a>
                                </td>
                            </tr>
                            <?php 
                                } 
                            } else {
                                echo "<tr><td colspan='7' class='py-4 text-center text-gray-500'>Belum ada data buku.</td></tr>";
                            }
                            ?>
                        </tbody>
                    </table>
                </div>
            </div>
            
            <!-- Footer -->
            <div class="bg-gray-100 text-center py-4 text-sm text-gray-500">
                &copy; <?= date("Y") ?> Sistem Perpustakaan Pemerintahan
            </div>
        </div>
    </div>
</body>
</html>