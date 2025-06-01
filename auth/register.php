<?php

require_once '../database.php';

class Register {
    public $db;

    public function __construct() {
        $this->db = new Database();
    }

    public function register() {
        $email = $_POST['email'];
        $username = $_POST['username'];
        $pass = $_POST['password'];
        $level = 1;

        // Validasi input
        if (empty($email) || empty($username) || empty($pass)) {
            echo "<script>alert('Username, Email atau Password tidak boleh kosong!');
            window.location.href = 'window.location.href='formregister.php';
            </script>";
        }else {
            $get_user = "SELECT * FROM user_perpus WHERE username = '$username";
            $result = $this->db->mysqli->prepare($get_user);
            $check_username = $result->num_rows;

            if ($check_username == 1) {
                echo "<script>alert('Email anda sudah terdaftar!');</script>";
            }else {
                $password_hash = password_hash($pass, PASSWORD_DEFAULT);
                $sql = "INSERT INTO user_perpus (email, username, password, level) 
                VALUES('".$email ."', '" .$username ."', '" .$pass ."', '".$level."')";
               
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
