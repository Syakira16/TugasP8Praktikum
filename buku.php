<?php

require_once 'Database.php';

class Buku {
    public $db;

    function __construct()
    {
        $this->db = new Database();
    }

    function show($table) {
        return $this->db->select($table);
    }

    function tambahData($data){
        $this->db->insert('buku', $data);
    }
}