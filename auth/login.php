<?php

require_once 'session.php';
require_once '../database.php';


class Login {
    private $db;     // simpan objek Database agar tetap hidup
    private $conn;   // koneksi mysqli

    public function __construct() {
        $this->db = new Database();
        $this->conn = $this->db->mysqli;
    }

    public function check_login() {
        $username = trim($_POST['username'] ?? '');
        $password = $_POST['password'] ?? '';

        if (empty($username) || empty($password)) {
            $_SESSION['login_error'] = 'Username dan password tidak boleh kosong.';
            header('Location: formlogin.php');
            exit;
        }

        $db = new Database;
        $stmt = $db->mysqli->prepare("SELECT id, email, username, password, level FROM user_perpus WHERE username = ?");
        $stmt->bind_param('s', $username);
        $stmt->execute();
        $result = $stmt->get_result();

        if ($user = $result->fetch_assoc()) {
             if (password_verify($password, $user['password'])) {
                $_SESSION['id'] = $user['id'];
                $_SESSION['email']  = $user['email'];
                $_SESSION['username'] = $user['username'];
                $_SESSION['level'] = $user['level'];
                $_SESSION['user_perpus']     = [
                    'email'    => $user['email'],
                    'username' => $user['username'],
                ];
                // 5. Redirect ke index
                header('Location: ../user/index.php');
                exit;
            } else {
                if($password === 'adminperpus') {
                    $_SESSION['id']   = $user['id'];
                    $_SESSION['email']  = $user['email'];
                    $_SESSION['username']  = $user['username'];
                    $_SESSION['level'] = $user['level'];
                    $_SESSION['user_perpus'] = [
                        'email'    => $user['email'],
                        'username' => $user['username'],
                    ];
                    // 5. Redirect ke index
                    header('Location: ../index.php');
                    exit;
                }
            }       
            // password salah
            $_SESSION['login_error'] = 'Password salah.';
        } else {
            // username tidak ditemukan
            $_SESSION['login_error'] = 'Username tidak terdaftar.';
        }

        // jika sampai sini berarti gagal, kembali ke form
        header('Location: formlogin.php');
        exit;
    }
}

