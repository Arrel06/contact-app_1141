<?php 

include 'koneksi.php';

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $id = $_POST['id'];
    $nomor = $_POST['nomor'];
    $owner = $_POST['owner'];

    $query = $pdo->prepare("UPDATE user SET nomor = ?, owner = ? WHERE id = ?");
    $query->execute([$nomor, $owner, $id]);

    header("Location: index.php");

} elseif ($_SERVER['REQUEST_METHOD'] == 'GET' && isset($_GET['id'])) {
    $id = $_GET['id'];
    $query = $pdo->prepare("SELECT * FROM user WHERE id = ?");
    $query->execute([$id]);
    $data = $query->fetch(PDO::FETCH_ASSOC);
}

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="output.css">
    <style>
        body {
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
    <div class="w-96 pt-[8%] m-auto">
        <div class="relative z-[1] bg-white max-w-[360px] mt-0 mr-auto mb-[100px] p-11 text-center">
            <h1 class="text-2xl font-semibold mb-5">Ubah Data: <?= $data['owner'] ?></h1>
            <form action="ubah.php" method="post">
                <input type="text" name="id" id="id" placeholder="id" value="<?= $data['id'] ?>" class="hidden">
                <input type="text" name="owner" id="owner" placeholder="Nama" value="<?= $data['owner'] ?>" class="bg-[#f2f2f2] w-[100%] border-0 mb-[15px] p-[15px] box-border text-sm outline-none">
                <input type="text" name="nomor" id="nomor" placeholder="Nomor Hp" value="<?= $data['nomor'] ?>" class="bg-[#f2f2f2] w-[100%] border-0 mb-[15px] p-[15px] box-border text-sm outline-none">
                <input type="submit" value="Ubah" class="uppercase outline-none bg-[#4CAF50] w-[100%] border-0 p-[15px] text-white text-sm cursor-pointer hover:bg-[#43A047] active:bg-[#43A047] focus:[#43A047] mb-4">
                <button class="uppercase outline-none bg-[#4CAF50] w-[100%] border-0 p-[15px] text-white text-sm cursor-pointer hover:bg-[#43A047] active:bg-[#43A047] focus:[#43A047]">
                    <a href="index.php" class="block w-full h-full">Kembali</a>
                </button>
            </form>
        </div>
    </div>
</body>
</html>