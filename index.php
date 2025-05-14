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
    <h1>Tabel Buku</h1>
        <table border="1">
            <thead>
                <th>No</th>
                <th>Judul Buku</th>
                <th>Penulis</th>
                <th>Penerbit</th>
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
                        echo '</tr>';
                    }
                ?>

            </tbody>
        </table>
</body>
</html>