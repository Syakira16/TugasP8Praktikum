<?php 

require_once 'Buku.php';

$buku = new Buku();
$table = 'buku';
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




        <?php 
            if(isset($_POST['submit'])){
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
                <th>Aksi</th>
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
                        echo '<td>
                                <a href="update.php?id_buku='.$data['id_buku'].'">Edit</a> |
                                <a href="delete.php?action=hapus&id_buku='.$data['id_buku'].'" onclick="return confirm(\'Yakin hapus data?\')">Hapus</a>
                            </td>';
                        echo '</tr>';
                    }
                ?>

            </tbody>
        </table>    
</body>
</html>
