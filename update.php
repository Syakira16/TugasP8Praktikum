<?php 

require_once 'Buku.php';

if(!isset($_GET['id_buku'])){
    header('location: index.php');
    exit;
}

$buku = new Buku();
$table = 'buku';
$id = $_GET['id_buku'];
// $where = ['id_buku' => $id];
$data = $buku->show($table);

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

    <form action="" method="POST">
    
             <input type="hidden" name="id" value="<?= $selected['id_buku']; ?>">
            <label>Judul Buku :</label><br>
            <input type="text" name="judul" value="<?= $selected['judul']; ?>" required><br>
            <label>Penulis :</label><br>
            <input type="text" name="penulis" value="<?= $selected['penulis']; ?>" required><br>
            <label>Penerbit :</label><br>
            <input type="text" name="penerbit" value="<?= $selected['penerbit']; ?>" required><br><br>
            <button type="submit" name="submit">Update</button>

                <label for="judul">Judul</label>
                <input type="text" name="judul" value="<?=row[0]['judul'];?>"></td>
            
                <label for="penulis">Penulis</label>
                <input type="text" name="penulis" value="<?=row[0]['penulis'];?>"></td>

                 <label for="penerbit">Penerbit</label>
                <input type="text" name="penerbit" value="<?=row[0]['penerbit'];?>"></td>
        
                <input type="submit" name="submit" value="SUBMIT">
                <input type="back" name="back" value="BACK">
         
    </form>
    
</body>
</html>

<?php
if(isset($_POST['back'])){
    header("location: index.php");
}

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
            echo "<script>alert('Data Berhasil Diupdate');</script>";    
        }

?>
