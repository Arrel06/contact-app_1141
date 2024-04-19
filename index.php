<?php 

include 'koneksi.php';

$query = $pdo->query("SELECT * FROM user");
$user = $query->fetchAll(PDO::FETCH_ASSOC);

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="output.css">
    <style>
        .nav {
            background: #76b852;
            background: rgb(141,194,111);
            background: linear-gradient(90deg, rgba(141,194,111,1) 0%, rgba(118,184,82,1) 50%);
            font-family: "Roboto", sans-serif;
            -webkit-font-smoothing: antialiased;
            -moz-osx-font-smoothing: grayscale;      
            }
    </style>
</head>

<body>
    <div class="flex h-screen">
        <div class="bg-green-600 text-white w-64 flex flex-col">
            <div class="p-4 bg-green-700">
                <h1 class="text-xl font-semibold">Halo!</h1>
            </div>
            <div class="flex-1 overflow-y-auto">
                <ul class="p-2">
                    <li class="py-1">
                        <a href="#" class="text-gray-300 hover:text-white">Dashboard</a>
                    </li>
                    <li class="py-1">
                        <a href="#" class="text-gray-300 hover:text-white">Users</a>
                    </li>
                    <li class="py-1">
                        <a href="#" class="text-gray-300 hover:text-white">Settings</a>
                    </li>
                </ul>
            </div>
            <a href="login.html" class="p-2 mb-5">Logout</a>
        </div>
        <!-- Content -->
        <div class="flex-1 bg-gray-200">
            <div class="p-5 m-auto">
                <h1 class="text-center text-3xl font-bold">Kontak User</h1>
                <p class="text-sm text-center mt-2 mb-5">Anda bisa melakukan edit dan hapus data kontak</p>
                <div class="overflow-x-auto">
                <table class="min-w-full bg-white table-auto">
                    <thead>
                        <tr>
                            <th class="border-b-2 border-gray-300 py-2 px-4">ID</th>
                            <th class="border-b-2 border-gray-300 py-2 px-4">NAMA</th>
                            <th class="border-b-2 border-gray-300 py-2 px-4">NOMER TELEPON</th>
                            <th class="border-b-2 border-gray-300 py-2 px-4">Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php foreach ($user as $data): ?>
                        <tr>
                            <td class="border-b border-gray-300 py-4 px-4 text-center"><?= $data['id'] ?></td>
                            <td class="border-b border-gray-300 py-4 px-4"><?= $data['owner'] ?></td>
                            <td class="border-b border-gray-300 py-4 px-4 text-center"><?= $data['nomor'] ?></td>
                            <td class="border-b border-gray-300 py-4 px-4 text-center mx-auto">
                                <button class="bg-green-500">
                                    <a href="ubah.php?id=<?= $data['id'] ?>" class="px-8 py-4">Edit</a>
                                </button>
                                <button class="bg-red-500" onclick="return confirm('Apakah Anda yakin ingin menghapus data ini?')">
                                    <a href="hapus.php?id=<?= $data['id'] ?>" class="px-8 py-4">Hapus</a>
                                </button>
                            </td>
                        </tr>
                        <?php endforeach ?>
                    </tbody>
                </table>
            </div>
            </div>
        </div>
    </div>
</body>

</html>