<?php

require_once '../database.php';

class Register {
    public $db;

    public function __construct() {
        $this->db = new Database();
    }

    public function register() {
        // Ambil data dari POST dengan safe fallback
        $username = $_POST['username'];
        $email = $_POST['email'];
        $pass = $_POST['password'];
        $level = 1;

        // Validasi input
        if (empty($username) || empty($email) || empty($pass)) {
            echo "<script>alert('Username, Email atau Password tidak boleh kosong!');
            window.location.href = 'window.location.href='formregister.php';
            </script>";
            return;
        }else {
            $get_user = "SELECT * FROM user_perpus WHERE email = '$email";
            $result = $this->db->mysqli->prepare($get_user);
            $check_email = $result->num_rows;

            if ($check_email == 1) {
                echo "<script>alert('Email anda sudah terdaftar!');</script>";
            }else {
                $password_hash = password_hash($pass, PASSWORD_DEFAULT);
                $sql = "INSERT INTO user_perpus (username, email, password, level) 
                VALUES('".$username ."', '" .$email ."', '" .$pass ."', '".$level."')";
               
                $result = $this->db->mysqli->query($sql);

                if($result){
                    echo "<script>window.location.href='formlogin.php';</script>";
                    header("location:formlogin.php");
                }else {
                   echo "<script>alert('Register Gagal!'); </script>";
                }
            }
        }
    }    
}
