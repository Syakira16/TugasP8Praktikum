<?php

require_once 'Buku.php';
$buku = new Buku();

if(@$_GET['action'] == 'hapus'){
    $where = ['id_buku' => $_GET['id_buku']];
    $buku->hapusData($where);

    header("location:index.php");
}

?>