<?php
require_once '../auth/session.php';

if(!isset($_SESSION['id'])) {
    header('Location: ../auth/formlogin.php');
    exit();
} 

$role = $_SESSION['level'];
$username = $_SESSION['user_perpus']['email'];

require_once '../database.php';

$db = new Database();
$result = $db->mysqli->query("SELECT * FROM Buku");

$datas = [];
if($result) {
    $datas = $result->fetch_all(MYSQLI_ASSOC);
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Data Buku - Perpustakaan Online</title>
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
->
    <h1>Daftar Buku</h1>
    <table border="1">
        <thead>
            <tr>
                <th>No</th>
                <th>Judul Buku</th>
                <th>Penulis</th>
                <th>Penerbit</th>
            </tr>
        </thead>
        <tbody>
            <?php
            $no = 1;
            $data = $buku->show($table);
            foreach ($data as $item) {
                echo '<tr>';
                echo '<td>' . $no++ . '</td>';
                echo '<td>' . htmlspecialchars($item['judul']) . '</td>';
                echo '<td>' . htmlspecialchars($item['penulis']) . '</td>';
                echo '<td>' . htmlspecialchars($item['penerbit']) . '</td>';
                echo '</tr>';
            }
            ?>
        </tbody>
    </table>
</body>
</html>
