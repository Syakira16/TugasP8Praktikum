<?php 

require_once 'Buku.php';

$buku = new Buku();
$table = 'buku';
$judul = $_GET['judul'];
$where = ['judul' => $judul];
$data = $buku->show($table, $where);

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Update Buku</title>
</head>
<body>
    <h1>Update Data Buku</h1>

    <form action="" method="POST">
        <table>
            <label for="judul">Judul :</label>
            <input type="text" name="judul" value=">
        </table>
    </form>
    
</body>
</html>