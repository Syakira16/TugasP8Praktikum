<?php 
require_once 'Buku.php';

if (!isset($_GET['id_buku'])) {
    header('location: index.php');
    exit;
}

$buku = new Buku();
$table = 'buku';
$id = $_GET['id_buku'];
$data = $buku->show($table);
$selected = null;

foreach ($data as $d) {
    if ($d['id_buku'] == $id) {
        $selected = $d;
        break;
    }
}

if (!$selected) {
    echo "Data tidak ditemukan.";
    exit;
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Update Buku</title>
    <link rel="stylesheet" href="style.css">
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;600&display=swap" rel="stylesheet">
</head>
<body>
    <h1>Update Data Buku</h1>

    <div class="form-wrapper">
        <a href="index.php" class="back-button">← Kembali</a>

        <form action="" method="POST">
            <input type="hidden" name="id_buku" value="<?= $selected['id_buku']; ?>">

            <div class="form-group">
                <label for="judul">Judul:</label>
                <input type="text" name="judul" id="judul" value="<?= $selected['judul']; ?>" required>
            </div>

            <div class="form-group">
                <label for="penulis">Penulis:</label>
                <input type="text" name="penulis" id="penulis" value="<?= $selected['penulis']; ?>" required>
            </div>

            <div class="form-group">
                <label for="penerbit">Penerbit:</label>
                <input type="text" name="penerbit" id="penerbit" value="<?= $selected['penerbit']; ?>" required>
            </div>

            <div class="form-buttons">
                <button type="submit" name="submit" class="btn">Ubah Buku</button>
            </div>
        </form>
    </div>

    <?php
    if (isset($_POST['submit'])) {
        $judul = $_POST['judul'];
        $penulis = $_POST['penulis'];
        $penerbit = $_POST['penerbit'];

        $data = [
            'judul' => $judul,
            'penulis' => $penulis,
            'penerbit' => $penerbit
        ];

        $where = ['id_buku' => $id];
        $buku->ubahData($data, $where);

        echo "<script>alert('Data Berhasil Diupdate'); window.location.href='index.php';</script>";
    }
    ?>
</body>
</html>
