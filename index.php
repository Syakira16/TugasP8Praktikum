<?php 

require_once 'auth/session.php';

if (!isset($_SESSION['id'])) {
    header('Location: auth/formlogin.php');
    exit;
}

$level = $_SESSION['level'];
$username = $_SESSION['user_perpus']['username'];

require_once 'database.php';

$db = new Database();
$result = $db->mysqli->query("SELECT * FROM Buku");

$datas = [];
if($result) {
    $datas = $result->fetch_all(MYSQLI_ASSOC);
}
?>

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Perpustakaan Online</title>
    <link rel="stylesheet" href="style.css">
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;600&display=swap" rel="stylesheet">

</head>
<body>
     <nav>
        <h2>Wattpad</h2>
        <div style="float: right;" class="nav-buttons">
            <span style="margin-top: 5px;">Halo, <?= $_SESSION['username']; ?></span>
            <a href="auth/logout.php" onclick="return confirm('Yakin ingin logout?')">
                <button type="button">Logout</button>
            </a>
        </div>
    </nav>
    <section class="content">
        <?php if ($level === 0): ?>
            <h1>Tambah Data Buku</h1>
                <div class="form-wrapper">
                    <form action="" method="POST">
                        <div class="form-group">
                            <label for="judul">Judul:</label>
                            <input type="text" id="judul" name="judul" required>
                        </div>

                        <div class="form-group">
                            <label for="penulis">Penulis:</label>
                            <input type="text" id="penulis" name="penulis" required>
                        </div>

                        <div class="form-group">
                            <label for="penerbit">Penerbit:</label>
                            <input type="text" id="penerbit" name="penerbit" required>
                        </div>

                        <div class="form-buttons">
                            <button type="reset" class="btn-delete">Reset</button>
                            <button type="submit" name="submit" class="btn">Submit</button>
                        </div>
                    </form>
                </div>
             <?php endif ?>
        <?php 
            if(isset($_POST['submit']) and $level === 0){
                $judul = $_POST['judul'];
                $penulis = $_POST['penulis'];
                $penerbit = $_POST['penerbit'];

                $data = [
                    'judul' => $judul,
                    'penulis' => $penulis,
                    'penerbit' => $penerbit,
                ];

                $buku->tambahData($data);
                echo "<script>alert('Data Berhasil Di Simpan');</script>";

                header("Location: index.php");
            }
        ?>
    <br><br>
    <h1>Tabel Buku</h1>
        <table border="1">
            <thead>
                <th>No</th>
                <th>Judul Buku</th>
                <th>Penulis</th>
                <th>Penerbit</th>
                <?php if ($role === 0): ?>
                    <th>Aksi</th>
                <?php endif; ?>
            </thead>
            <tbody>
                <?php
                    $no = 1;
                    $data = $buku->show($table);
                    foreach ($data as $data) {
                        echo '<tr>';
                        echo '<td>'.$no++.'</td>';
                        echo '<td>'.$data['judul'].'</td>';
                        echo '<td>'.$data['penulis'].'</td>';
                        echo '<td>'.$data['penerbit'].'</td>';
                        if ($role === 0) {
                        echo '<td>
                                <a href="update.php?id_buku='.$data['id_buku'].'">Edit</a> |
                                <a href="delete.php?action=hapus&id_buku='.$data['id_buku'].'" onclick="return confirm(\'Yakin hapus data?\')">Hapus</a>
                            </td>';
                        }    
                        echo '</tr>';
                    }
                ?>

            </tbody>
        </table>    
</body>
</html>
