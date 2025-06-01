<?php

// require_once __DIR__ . "/../database.php";

// class Session {
//     public $db;
//     public $login_user;

//     public function __construct() {
//         $this->db = new Database();
        session_start();

//         if (!isset($_SESSION['username']) || !isset($_SESSION['level'])) {
//             header("Location: ../formlogin.php");
//             exit;
//         }
//     }

   function isLoggedIn() {
        return isset($_SESSION['id']);
    }

    function getUserRole() {
        return $_SESSION['level'] ?? null;
    }

    function getUsername() {
        return $_SESSION['username'] ?? '';
    }

    // public function logout() {
    //     if (isset($_POST['logout'])) {
    //         session_destroy();
    //         echo "<script>window.location.href='index.php';</script>";
    //     }
    // }
// }

?>
