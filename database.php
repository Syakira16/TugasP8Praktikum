<?php

define('DB_HOST', 'localhost');
define('DB_USER', 'root');
define('DB_PASS', '');
define('DB_NAME', 'perpustakaan_buku');

class Database {
    public $mysqli;

    function __construct()
    {
        $this->mysqli = new mysqli(DB_HOST, DB_USER, DB_PASS, DB_NAME);
        if ($this->mysqli->connect_errno) {
            echo '<br>Tidak tersambung ke database !<br>';
        }
    }

    function select($table) {
        $sql = ("SELECT * FROM $table");

        $result = $this->mysqli->query($sql);
        return $result->fetch_all(MYSQLI_ASSOC);
    }

    function insert($table, $rows){
        $sql = "INSERT INTO $table";
        $row = null;
        $value = null;

        foreach($rows as $key => $nilai){
            $row .= ",".$key;
            $value .= ",'".$nilai."'";
        }

        $sql .= "(". substr($row, 1).")";
        $sql .= "VALUES (". substr($value, 1). ")";

        $query = $this->mysqli->prepare($sql);
        $query->execute() or die($this->mysqli->error);

        if($query){
            echo "<script>alert('Data Berhasil Disimpan!');</script>";
        }
    }

    function __destruct()
    {
        $this->mysqli->close();
    }
}