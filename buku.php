<?php

require_once 'Database.php';

class Buku {
    public $db;

    function __construct()
    {
        $this->db = new database();
    }

    function show($table) {
        return $this->db->select($table);
    }

    function tambahData($data){
        $this->db->insert('buku', $data);
    }

    function ubahData($table, $field, $where){
        $this->db->update('buku', $data, $id);
    }

    function hapusData($table, $where){
        $this->db->delete('buku', $id);
    }
}